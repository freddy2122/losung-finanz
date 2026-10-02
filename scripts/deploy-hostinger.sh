#!/usr/bin/env bash
set -euo pipefail

# Déploiement Laravel vers Hostinger (sans GitHub)
# Usage :
#   export DEPLOY_HOST="xxx.hostinger.com"
#   export DEPLOY_USER="u123456789"
#   export DEPLOY_PORT="65002"          # port SSH Hostinger (souvent 65002)
#   export DEPLOY_PATH="domains/Mutuo-swis.ch"   # racine Laravel sur le serveur
#   export DEPLOY_PHP="php"             # ou /usr/bin/php8.2
#   ./scripts/deploy-hostinger.sh
#
# Prérequis hPanel :
# - SSH activé
# - Document root du domaine = public/ (ex. .../domains/ued-swiss.ch/public)
# - Fichier .env déjà présent sur le serveur (jamais écrasé par ce script)

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

: "${DEPLOY_HOST:?Définir DEPLOY_HOST}"
: "${DEPLOY_USER:?Définir DEPLOY_USER}"
DEPLOY_PORT="${DEPLOY_PORT:-65002}"
DEPLOY_PATH="${DEPLOY_PATH:-domains/ued-swiss.ch}"
DEPLOY_PHP="${DEPLOY_PHP:-php}"
SSH_TARGET="${DEPLOY_USER}@${DEPLOY_HOST}"
DEPLOY_SSH_KEY="${DEPLOY_SSH_KEY:-$ROOT_DIR/.deploy/hostinger_ed25519}"
SSH_OPTS=(-p "$DEPLOY_PORT" -o StrictHostKeyChecking=accept-new)
if [[ -f "$DEPLOY_SSH_KEY" ]]; then
  SSH_OPTS+=(-i "$DEPLOY_SSH_KEY")
fi

echo "==> Préparation locale (composer production)"
composer install --no-dev --optimize-autoloader --no-interaction

echo "==> Synchronisation rsync vers ${SSH_TARGET}:${DEPLOY_PATH}"
rsync -avz --delete \
  --exclude '.git/' \
  --exclude '.env' \
  --exclude '.env.*' \
  --exclude 'node_modules/' \
  --exclude 'tests/' \
  --exclude '.cursor/' \
  --exclude '.user.ini' \
  --exclude 'storage/logs/*' \
  --exclude 'storage/framework/cache/data/*' \
  --exclude 'storage/framework/sessions/*' \
  --exclude 'storage/framework/views/*' \
  -e "ssh ${SSH_OPTS[*]}" \
  ./ "${SSH_TARGET}:${DEPLOY_PATH}/"

echo "==> Commandes post-déploiement sur le serveur"
ssh "${SSH_OPTS[@]}" "$SSH_TARGET" bash -s <<EOF
set -euo pipefail
cd ~/${DEPLOY_PATH}

${DEPLOY_PHP} artisan down --retry=60 || true
${DEPLOY_PHP} artisan migrate --force
${DEPLOY_PHP} artisan config:cache
${DEPLOY_PHP} artisan route:cache
${DEPLOY_PHP} artisan view:cache
${DEPLOY_PHP} artisan storage:link || true
chmod -R ug+rwx storage bootstrap/cache
${DEPLOY_PHP} artisan up
echo "Déploiement terminé."
EOF

echo "==> OK — site déployé sur Hostinger"
