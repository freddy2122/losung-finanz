@extends('emails.layout')

@section('content')
	<tr>
		<td class="" width="600px" >
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" >
				<tr>
					<td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
						<![endif]-->
						<div style="background:#fff;background-color:#fff;margin:0 auto;max-width:600px">
							<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#fff;background-color:#fff;width:100%">
								<tbody>
									<tr>
										<td style="border:0 solid #1e293b;direction:ltr;font-size:0;padding:20px 0;padding-bottom:20px;padding-left:30px;padding-right:30px;padding-top:20px;text-align:center">
											<!--[if mso | IE]>
											<table role="presentation" border="0" cellpadding="0" cellspacing="0">
												<tr>
													<td align="left" class="" style="vertical-align:top;width:540px;" >
														<![endif]-->
														<div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
															<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="background-color:transparent;border:0 solid transparent;vertical-align:top" width="100%">
																<tbody>
																	<tr>
																		<td align="left" style="font-size:0;padding:10px 25px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;word-break:break-word">
																			<div style="font-family:Helvetica;font-size:16px;font-weight:400;letter-spacing:0;line-height:1.5;text-align:left;color:#1e293b">
																				<p style="margin-top: 0;margin-bottom: 0;"><span style="color:#1e293b"><strong>{{ $data['name'] }}</strong> (</span><span style="color:#1e293b;font-size:14px">{{ $data['email'] }})</span></p>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td style="background:0 0;font-size:0;word-break:break-word">
																			<!--[if mso | IE]>
																			<table role="presentation" border="0" cellpadding="0" cellspacing="0">
																				<tr>
																					<td height="20" style="height:20px;">
																						<![endif]-->
																						<div style="height:20px">&nbsp;</div>
																						<!--[if mso | IE]>
																					</td>
																				</tr>
																			</table>
																			<![endif]-->
																		</td>
																	</tr>
																	<tr>
																		<td style="background:0 0;font-size:0;word-break:break-word">
																			<!--[if mso | IE]>
																			<table role="presentation" border="0" cellpadding="0" cellspacing="0">
																				<tr>
																					<td height="20" style="height:20px;">
																						<![endif]-->
																						<div style="height:20px">&nbsp;</div>
																						<!--[if mso | IE]>
																					</td>
																				</tr>
																			</table>
																			<![endif]-->
																		</td>
																	</tr>
																	<tr>
																		<td align="left" style="font-size:0;padding:10px 25px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;word-break:break-word">
																			<div style="font-family:Helvetica;font-size:16px;font-weight:400;letter-spacing:0;line-height:1.5;text-align:left;color:#1e293b">
																				<p style="margin-top: 0;margin-bottom: 0;"><span style="color:#64748b">Message:</span></p>
																				<p style="margin-top: 0;margin-bottom: 0;"><span style="color:#1e293b"><strong>{{ $data['message'] }}</strong></span></p>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
														<!--[if mso | IE]>
													</td>
												</tr>
											</table>
											<![endif]-->
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!--[if mso | IE]>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	
	<tr>
		<td class="" width="600px" >
			<table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" >
				<tr>
					<td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
						<![endif]-->
						<div style="background:0 0;background-color:transparent;margin:0 auto;max-width:600px">
							<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:0 0;background-color:transparent;width:100%">
								<tbody>
									<tr>
										<td style="border:0 solid transparent;direction:ltr;font-size:0;padding:20px 0;padding-bottom:0;padding-left:20px;padding-right:20px;padding-top:0;text-align:center">
											<!--[if mso | IE]>
											<table role="presentation" border="0" cellpadding="0" cellspacing="0">
												<tr>
													<td align="left" class="" style="vertical-align:top;width:560px;" >
														<![endif]-->
														<div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
															<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="background-color:transparent;border:0 solid transparent;vertical-align:top" width="100%">
																<tbody>
																	<tr>
																		<td style="font-size:0;padding:10px 25px;padding-top:20px;padding-right:10px;padding-bottom:20px;padding-left:10px;word-break:break-word">
																			<p style="margin-top: 0;margin-bottom: 0;border-top:solid 1px #ebebeb;font-size:1px;margin:0 auto;width:100%"></p>
																			<!--[if mso | IE]>
																			<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 1px #ebebeb;font-size:1px;margin:0px auto;width:540px;" role="presentation" width="540px" >
																				<tr>
																					<td style="height:0;line-height:0;"> &nbsp;</td>
																				</tr>
																			</table>
																			<![endif]-->
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
														<!--[if mso | IE]>
													</td>
												</tr>
											</table>
											<![endif]-->
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!--[if mso | IE]>
					</td>
				</tr>
			</table>
		</td>
	</tr>
@endsection