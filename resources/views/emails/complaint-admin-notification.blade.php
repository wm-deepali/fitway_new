<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Complaint Registered</title>
</head>
<body style="margin:0;padding:0;background-color:#f1f2f4;font-family:'Segoe UI',Arial,sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f1f2f4;padding:32px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,.08);">

                    <tr>
                        <td style="background-color:#b3261e;padding:22px 32px;">
                            <h1 style="margin:0;color:#ffffff;font-size:18px;font-weight:700;">
                                🔔 New Complaint Registered
                            </h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:28px 32px;">
                            <p style="margin:0 0 20px;color:#202223;font-size:14px;">
                                A new complaint has been submitted through the website. Details below:
                            </p>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f8f8f9;border-radius:8px;">
                                <tr>
                                    <td style="padding:16px 20px;">
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#6d7175;font-size:12.5px;font-weight:600;width:160px;">Complaint ID</td>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#202223;font-size:13.5px;font-weight:700;">{{ $complaint->complaint_code }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#6d7175;font-size:12.5px;font-weight:600;">Status</td>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#202223;font-size:13.5px;">{{ $complaint->status_label }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#6d7175;font-size:12.5px;font-weight:600;">Customer Name</td>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#202223;font-size:13.5px;">{{ $complaint->customer_name }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#6d7175;font-size:12.5px;font-weight:600;">Mobile Number</td>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#202223;font-size:13.5px;">
                                                    <a href="tel:{{ $complaint->mobile_number }}" style="color:#303d89;text-decoration:none;">{{ $complaint->mobile_number }}</a>
                                                </td>
                                            </tr>
                                            @if($complaint->email)
                                            <tr>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#6d7175;font-size:12.5px;font-weight:600;">Email</td>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#202223;font-size:13.5px;">
                                                    <a href="mailto:{{ $complaint->email }}" style="color:#303d89;text-decoration:none;">{{ $complaint->email }}</a>
                                                </td>
                                            </tr>
                                            @endif
                                            @if($complaint->full_address)
                                            <tr>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#6d7175;font-size:12.5px;font-weight:600;vertical-align:top;">Address</td>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#202223;font-size:13.5px;">{{ $complaint->full_address }}</td>
                                            </tr>
                                            @endif
                                            @if($complaint->landmark)
                                            <tr>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#6d7175;font-size:12.5px;font-weight:600;">Landmark</td>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#202223;font-size:13.5px;">{{ $complaint->landmark }}</td>
                                            </tr>
                                            @endif
                                            @if($complaint->city || $complaint->state)
                                            <tr>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#6d7175;font-size:12.5px;font-weight:600;">City / State</td>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#202223;font-size:13.5px;">{{ $complaint->city->name ?? '' }}@if($complaint->state), {{ $complaint->state->name }}@endif</td>
                                            </tr>
                                            @endif
                                            @if($complaint->pin_code)
                                            <tr>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#6d7175;font-size:12.5px;font-weight:600;">Pin Code</td>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#202223;font-size:13.5px;">{{ $complaint->pin_code }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#6d7175;font-size:12.5px;font-weight:600;vertical-align:top;">Complaint Detail</td>
                                                <td style="padding:7px 0;border-bottom:1px solid #e3e5e8;color:#202223;font-size:13.5px;">{{ $complaint->complaint_detail }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:7px 0;color:#6d7175;font-size:12.5px;font-weight:600;">Submitted On</td>
                                                <td style="padding:7px 0;color:#202223;font-size:13.5px;">{{ $complaint->created_at->format('d M Y, h:i A') }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <div style="text-align:center;margin-top:24px;">
                                <a href="{{ route('admin.complaint.complaints.index') }}" style="display:inline-block;background-color:#303d89;color:#ffffff;text-decoration:none;padding:11px 24px;border-radius:8px;font-size:13.5px;font-weight:600;">
                                    View in Admin Panel
                                </a>
                            </div>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>