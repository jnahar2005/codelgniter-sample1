<!doctype html>
<html lang="en">
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Title</title>
<style type="text/css">
@media only screen and (max-width: 480px) {
    table { width: 100% !important; }
    table tr td { display: block; }
    table.appStore tr td { display: inline-block; }
    table.screenshot tr td { display: inline-block; }
    td.straigt-line{display: none;}
    .im {color: #000000 !important;}
}
</style>

</head>
<body>
<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family: 'Source Sans Pro', sans-serif; width: 800px; border: 1px solid #ccc;">
<thead style="background: rgba(30, 87, 153, 1);
    padding: 5px 0;">
    <tr>
        <td style="padding: 10px 20px"><img style="max-width: 160px;" src="<?php echo base_url(); ?>"></td>
    </tr>
</thead>
 <tbody>    
    <tr>
        <td style="font-family: 'Source Sans Pro', sans-serif;  font-size: 26px; font-weight: 800; color: #000; text-align: left; padding: 50px 30px 30px 50px;">
            <?php echo (isset($heading) && $heading!=''?$heading:''); ?>,
        </td>
    </tr>
    <tr>
        <td style="font-family: 'Source Sans Pro', sans-serif; font-size: 22px;line-height: 40px; font-weight: 100; color: #000; text-align: left; padding: 0 50px 50px 50px;">
            <?php echo (isset($textMsg) && $textMsg!=''?$textMsg:'Message'); ?>
        </td>
    </tr>
    <tr>
        <td style=" padding: 0 50px 50px 50px;font-size: 26px; font-weight: 800; color: #000;"> 
            <p style="margin-bottom: 5px; margin-top: 5px;">All the Best,</p>
            <span style="font-family: 'Source Sans Pro', sans-serif; font-weight: 400; color: #000000; font-size: 18px;">Team abc</span>
        </td>
    </tr>
</tbody>
<tfoot style="background: #eaeaea; text-align: center;width: 100%;">
<tr>
    <td colspan="2" style="padding: 15px;border-top: 1px solid #cccccc;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
                <td>
                    <a style="color: #4e89c2;;text-decoration: none;font-size: 30px;font-family: 'Source Sans Pro', sans-serif;  sans-serif;" href="">Abc</a>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin: 5px 0;font-family: 'Source Sans Pro', sans-serif;  sans-serif;color: #555759;font-size: 16px;">Atlanta Avenue Beach Us 
                </td>
            </tr>
            <tr>
                <td>
                    <table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
                        <tbody>
                            <tr>
                                <td>
                                    <p style="margin: 5px 0;font-family: Helvetica, Arial, sans-serif;color: #555759;font-size: 16px;">
                                        <a href="tel:999-888-7777">(999)-888-7777 </a>
                                </td>
                                <td class="straigt-line" style="width: 25px;">
                                   <span>|</span>
                                </td>
                                <td>
                                    <p style="margin: 5px 0;font-family: Helvetica, Arial, sans-serif;color: #555759;font-size: 16px;">
                                        <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
                                </td>                                            
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <!-- <tr>
                <td>
                    <a herf="mailto:info@bridge2pt.com" style="margin: 5px 0;font-family: 'Source Sans Pro', sans-serif;  sans-serif;color: #555759;font-size: 16px;">info@bridge2pt.com</a>
                </td>
            </tr> -->
          </tbody>
        </table>
    </td>
</tr>
</tfoot>

</table>

</body>
</html>