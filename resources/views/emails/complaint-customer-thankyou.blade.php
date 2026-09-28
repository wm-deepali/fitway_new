<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Received</title>
</head>

<body style="margin:0;padding:0;background-color:#f1f2f4;font-family:'Segoe UI',Arial,sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
        style="background-color:#f1f2f4;padding:32px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0"
                    style="background-color:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,.08);">

                    <!-- Header -->
                    <tr>
                        <td style="background-color:#303d89;padding:28px 32px;text-align:center;">
                            <h1 style="margin:0;color:#ffffff;font-size:22px;font-weight:700;">
                                {{ $generalSettings->site_name ?? 'Fitway' }}
                            </h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:36px 32px 24px;">
                            
                            <div style="text-align:center;margin-bottom:24px;">
                                <img src="{{ $message->embed(public_path('assets/images/logo.png')) }}"
                                    alt="{{ $generalSettings->site_name ?? 'Fitway' }}" width="160"
                                    style="display:block;margin:0 auto;max-width:160px;height:auto;border:0;outline:none;text-decoration:none;">
                            </div>

                            <h2 style="margin:0 0 12px;color:#202223;font-size:20px;text-align:center;">
                                Thank You, {{ $complaint->customer_name }}!
                            </h2>

                            <p
                                style="margin:0 0 20px;color:#6d7175;font-size:14.5px;line-height:1.7;text-align:center;">
                                We've received your complaint and our team is already on it. Here are your complaint
                                details for reference:
                            </p>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                                style="background-color:#f8f8f9;border-radius:8px;margin-bottom:24px;">
                                <tr>
                                    <td style="padding:16px 20px;">
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td
                                                    style="padding:6px 0;color:#6d7175;font-size:13px;font-weight:600;width:150px;">
                                                    Complaint ID</td>
                                                <td
                                                    style="padding:6px 0;color:#202223;font-size:13.5px;font-weight:700;">
                                                    {{ $complaint->complaint_code }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:6px 0;color:#6d7175;font-size:13px;font-weight:600;">
                                                    Status</td>
                                                <td style="padding:6px 0;color:#202223;font-size:13.5px;">
                                                    {{ $complaint->status_label }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:6px 0;color:#6d7175;font-size:13px;font-weight:600;">
                                                    Registered On</td>
                                                <td style="padding:6px 0;color:#202223;font-size:13.5px;">
                                                    {{ $complaint->created_at->format('d M Y, h:i A') }}
                                                </td>
                                            </tr>
                                            @if($complaint->full_address)
                                                <tr>
                                                    <td
                                                        style="padding:6px 0;color:#6d7175;font-size:13px;font-weight:600;vertical-align:top;">
                                                        Address</td>
                                                    <td style="padding:6px 0;color:#202223;font-size:13.5px;">
                                                        {{ $complaint->full_address }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($complaint->landmark)
                                                <tr>
                                                    <td style="padding:6px 0;color:#6d7175;font-size:13px;font-weight:600;">
                                                        Landmark</td>
                                                    <td style="padding:6px 0;color:#202223;font-size:13.5px;">
                                                        {{ $complaint->landmark }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($complaint->city || $complaint->state)
                                                <tr>
                                                    <td style="padding:6px 0;color:#6d7175;font-size:13px;font-weight:600;">
                                                        City / State</td>
                                                    <td style="padding:6px 0;color:#202223;font-size:13.5px;">
                                                        {{ $complaint->city->name ?? '' }}@if($complaint->state),
                                                        {{ $complaint->state->name }}@endif
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($complaint->pin_code)
                                                <tr>
                                                    <td style="padding:6px 0;color:#6d7175;font-size:13px;font-weight:600;">
                                                        Pin Code</td>
                                                    <td style="padding:6px 0;color:#202223;font-size:13.5px;">
                                                        {{ $complaint->pin_code }}
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td
                                                    style="padding:6px 0;color:#6d7175;font-size:13px;font-weight:600;vertical-align:top;">
                                                    Complaint Detail</td>
                                                <td style="padding:6px 0;color:#202223;font-size:13.5px;">
                                                    {{ $complaint->complaint_detail }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:0 0 8px;color:#202223;font-size:14px;font-weight:600;text-align:center;">
                                Our support team will contact you shortly.
                            </p>
                        </td>
                    </tr>

                    <!-- Contact strip -->
                    <tr>
                        <td style="background-color:#eef0fa;padding:24px 32px;">
                            <p
                                style="margin:0 0 12px;color:#303d89;font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.04em;text-align:center;">
                                Need urgent help? Reach us directly
                            </p>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="text-align:center;padding:4px 0;color:#202223;font-size:13.5px;">
                                        📧 {{ $generalSettings->support_email ?? 'fitwayimpex@gmail.com' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;padding:4px 0;color:#202223;font-size:13.5px;">
                                        📞 {{ $generalSettings->phone ?? '+91 83539 74150' }}
                                    </td>
                                </tr>
                                @if($generalSettings->whatsapp ?? false)
                                    <tr>
                                        <td style="text-align:center;padding:4px 0;color:#202223;font-size:13.5px;">
                                            💬 WhatsApp: {{ $generalSettings->whatsapp }}
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:20px 32px;text-align:center;">
                            <p style="margin:0;color:#8c9196;font-size:11.5px;">
                                © {{ date('Y') }} {{ $generalSettings->site_name ?? 'Fitway' }}. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>