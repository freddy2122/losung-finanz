<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Review
{
	const DISK = 'local';
	const DIRECTORY = 'reviews';

	/**
	 * Enregistre un nouvel avis en attente de validation.
	 */
	public static function create(array $data): string
	{
		$id = 'AVIS-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));

		$payload = array_merge($data, [
			'id'         => $id,
			'status'     => 'pending',
			'created_at' => now()->toDateTimeString(),
			'decided_at' => null,
		]);

		self::write($id, $payload);

		return $id;
	}

	public static function find(string $id): ?array
	{
		$path = self::path($id);

		if (!Storage::disk(self::DISK)->exists($path)) {
			return null;
		}

		$data = json_decode(Storage::disk(self::DISK)->get($path), true);

		return is_array($data) ? $data : null;
	}

	public static function approve(string $id): bool
	{
		return self::decide($id, 'approved');
	}

	public static function reject(string $id): bool
	{
		return self::decide($id, 'rejected');
	}

	/**
	 * Retourne les avis approuvés, les plus récents en premier.
	 */
	public static function approved(?int $limit = null): array
	{
		$reviews = [];

		foreach (Storage::disk(self::DISK)->files(self::DIRECTORY) as $file) {
			$data = json_decode(Storage::disk(self::DISK)->get($file), true);

			if (is_array($data) && ($data['status'] ?? null) === 'approved') {
				$reviews[] = $data;
			}
		}

		usort($reviews, function ($a, $b) {
			return strtotime($b['created_at'] ?? 'now') <=> strtotime($a['created_at'] ?? 'now');
		});

		return $limit ? array_slice($reviews, 0, $limit) : $reviews;
	}

	private static function decide(string $id, string $status): bool
	{
		$review = self::find($id);

		if (!$review) {
			return false;
		}

		$review['status'] = $status;
		$review['decided_at'] = now()->toDateTimeString();

		self::write($id, $review);

		return true;
	}

	private static function write(string $id, array $payload): void
	{
		Storage::disk(self::DISK)->put(
			self::path($id),
			json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
		);
	}

	private static function path(string $id): string
	{
		return self::DIRECTORY . '/' . basename($id) . '.json';
	}
}
