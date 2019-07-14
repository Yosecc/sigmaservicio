<!doctype html>
<html>
<head>
<title></title>
<style type="text/css">
/* CLIENT-SPECIFIC STYLES */
body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

/* RESET STYLES */
img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

/* iOS BLUE LINKS */
a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

.logo{
    width: 120px;

}
/* MOBILE STYLES */
@media screen and (max-width: 600px) {
    
  .img-max {
    width: 100% !important;
    max-width: 100% !important;
    height: auto !important;
  }

  .max-width {
    max-width: 100% !important;
  }

  .mobile-wrapper {
    width: 85% !important;
    max-width: 85% !important;
  }

  .mobile-padding {
    padding-left: 5% !important;
    padding-right: 5% !important;
  }

  .logo{
    width: 90px;

    }
}

/* ANDROID CENTER FIX */
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
@php
    $img= public_path('frontend/images/bg1.jpeg');
    $logo = public_path('images/logo.png');
@endphp

<body style="margin: 0 !important; padding: 0; !important background-color: #ffffff;" bgcolor="#ffffff">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
   {{--  Lorem ipsum dolor que ist --}}
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" valign="top" width="100%" background="bg.jpg" bgcolor="#3b4a69" style="background: #3b4a69 url('{{ $message->embed($img) }}'); background-size: cover; padding: 50px 15px; " class="mobile-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                <tr>
                    <td align="center" valign="top" style="">
                        <img src="{{ $message->embed($logo) }}" class="logo"  border="0" style="display: block;">
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
                        <h1 style="font-size: 40px; color: #ffffff;"></h1>
                      
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td align="center" height="100%" valign="top" width="100%" bgcolor="#f6f6f6" style="padding: 50px 15px;" class="mobile-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                <tr>
                    <td align="center" valign="top" style="padding: 0 0 25px 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            {{-- <tr>
                                <td align="center" bgcolor="#ffffff" style="border-radius: 3px 3px 0 0;">
                                    <img src="article-1.png" width="600" height="200" alt="insert alt text here" style="display: block; border-radius: 3px 3px 0 0; font-family: sans-serif; font-size: 16px; color: #999999;" class="img-max"/>
                                </td>
                            </tr> --}}
                            <tr>
                                <td align="center" bgcolor="#ffffff" style="border-radius: 0 0 3px 3px; padding: 25px;">
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td align="" style="font-family: Open Sans, Helvetica, Arial, sans-serif;">
                                                <h2 style="font-size: 20px; color: #444444; margin: 0; padding-bottom: 10px;">Mensaje Recibido desde Pagina Web </h2>

                                                <p style="color: #999999; font-size: 16px; line-height: 24px;">
                                                   <b>Nombres: {{ $nombres }}</b> 
                                                </p>
                                                <p style="color: #999999; font-size: 16px; line-height: 24px;">
                                                   <b>Mail: {{ $email }}</b> 
                                                </p>
                                                <p style="color: #999999; font-size: 16px; line-height: 24px;">
                                                   <b>Telefono: {{ $telefono }}</b> 
                                                </p>
                                                <p style="color: #999999; font-size: 16px; line-height: 24px;">
                                                   <b>Servicio: {{ $servicio }}</b> 
                                                </p>

                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                      </table>
                    </td>
                </tr>
                
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td align="center" height="100%" valign="top" width="100%" bgcolor="#f6f6f6" style="padding: 0 15px 40px 15px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                <tr>
                    <td align="center" valign="top" style="padding: 0 0 5px 0;">
                        <img src="{{ $message->embed($logo) }}" width="50" height="50" border="0" style="display: block;">
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #999999;">
                        <p style="font-size: 14px; line-height: 20px;">
                         
                        </p>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
</body>
</html>
