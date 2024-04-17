<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Soil 2 Soul</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<?php //debug($data);die; ?>

<body>
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td style="background-color:#F7F8F9">
      <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">
          <tbody>
            <tr>
              <td style="height:34px;"></td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td style="text-align: center;">
                      <!-- <img src="img/etoslogo.png" alt="ETOS" title="ETOS"/> -->
                      <?php echo $this->Html->image('logo.png', array('fullBase' => true,'alt'=>'soil2soul')); ?>
                    </td>
                    
                  </tr>
                </tbody>
              </table></td>
            </tr>

            <tr>
              <td style="height:22px;"></td>
            </tr>
          
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-moz-border-radius:4px;
                -webkit-border-radius:4px;
                border-radius:4px; background-color:#FFFFFF;     -webkit-box-shadow: 0px 5px 4px 0px rgba(211,214,222,0.7);
                -moz-box-shadow: 0px 5px 4px 0px rgba(211,214,222,0.7);
                box-shadow: 0px 5px 4px 0px rgba(211,214,222,0.7);">
                  <tbody>
                    <tr>
                      <td style="padding:24px 30px;" valign="top">
                     
                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td style="" valign="top">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tbody>
                               
                                  <td style="height:20px">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td style="height:20px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                      <tr>
                                        <td width="206" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td height="23"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;"> Name</font></td>
                                              </tr>
                                            <tr>
                                              <td><font face="arial" color="#1e1e1e" style="font-size:14px; font-weight:bold;"><?php echo $data['ContactEnquery']['name'];?></font></td>
                                              </tr>
                                            </tbody>
                                          </table></td>
                                        <td valign="top">&nbsp;</td>
                                        <td width="206" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td height="23"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;"> Email Address</font></td>
                                              </tr>
                                            <tr>
                                              <td><font face="arial" color="#1e1e1e" style="font-size:14px; font-weight:bold;"><?php echo $data['ContactEnquery']['email'];?></font></td>
                                              </tr>
                                            </tbody>
                                          </table></td>
                                        </tr>
                                      <tr>
                                        <td valign="top">&nbsp;</td>
                                        <td valign="top">&nbsp;</td>
                                        <td valign="top">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td height="23"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;"> Phone Number</font></td>
                                              </tr>
                                            <tr>
                                              <td><font face="arial" color="#1e1e1e" style="font-size:14px; font-weight:bold;"><?php echo $data['ContactEnquery']['contact_no'];?></font></td>
                                              </tr>
                                            </tbody>
                                          </table></td>
                                        <td valign="top">&nbsp;</td>
                                        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td height="23"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;"> Message</font></td>
                                              </tr>
                                            <tr>
                                              <td><font face="arial" color="#1e1e1e" style="font-size:14px; font-weight:bold;"><?php echo $data['ContactEnquery']['msg'];?></font></td>
                                              </tr>
                                            </tbody>
                                          </table></td>
                                      </tr>
                                      <tr>
                                        <td valign="top">&nbsp;</td>
                                        <td valign="top">&nbsp;</td>
                                        <td valign="top">&nbsp;</td>
                                      </tr>
                                     
                                      <tr>
                                        <td style="height:20px">&nbsp;</td>
                                      </tr>

                                      </tbody>
                                    </table></td>
                                </tr>
                             
                                 <tr>
                                  <td style="height:20px">&nbsp;</td>
                                </tr>
                              </tbody>
                            </table>

                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </td>
                    </tr>
                  </tbody>
                </table>

              </td>
            </tr>
            
           
            <tr>
              <td style="height:30px;"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>

</body>
</html>
