<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Mind Body Health</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

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
                    <td valign="middle">
                      <!-- <img src="img/etoslogo.png" alt="ETOS" title="ETOS"/> -->
                      <?php echo $this->Html->image('emaillogo.png', array('fullBase' => true,'alt'=>'Mind Body Health')); ?>
                    </td>
                    <td align="right" valign="middle"><font face="arial" color="#000000" style="font-size:18px; font-weight:bold;">Appointment Request <span style="color: #952255"><strong>|</strong></span></font></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
            <tr>
              <td style="height:22px;"></td>
            </tr>
            <tr>
              <td><font face="arial" color="#727271" style="font-size:13px;">Dear <?php echo $data['Appointment']['name'];?>,</font></td>
            </tr>
            <tr>
              <td height="36" valign="middle"><font face="arial" color="#952255" style="font-size:16px; font-weight:bold;">Thank you for your interest in Mind Body Health!</font></td>
            </tr>
            <tr>
              <td><font face="arial" color="#000" style="font-size:15px;">Your appointment request has been submitted successfully. <br>
                Our team will get back to you soon!</font></td>
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
                                <tr>
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="-moz-border-radius:4px;
                                    -webkit-border-radius:4px;
                                    border-radius:4px; background-color:#f4f5f5;">
                                    <tbody>
                                      <tr>
                                        <td style="padding: 10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td height="24" valign="top"><font face="arial" color="#1e1e1e" style="font-size:14px; font-weight:bold;">Your Request</font></td>
                                            </tr>
                                            <tr>
                                              <td height="20" valign="middle"><font face="arial" color="#1e1e1e" style="font-size:13px; font-weight:normal;">&bull; Like to see <?php echo $data['DoctorType']['name'];?></font></td>
                                            </tr>
                                            <tr>
                                              <td height="20" valign="middle"><font face="arial" color="#1e1e1e" style="font-size:13px; font-weight:normal;">&bull; Like to meet <?php echo $data['Doctor']['name'];?></font></td>
                                            </tr>
                                            <tr>
                                              <td height="20" valign="middle">
                                                <font face="arial" color="#1e1e1e" style="font-size:13px; font-weight:normal;"> &bull; Appointment time: 
                                                 <!-- Appointment time --> 
                                                <?php if(!empty($appointmentTimes)){ echo $appointmentTimes;?>
                                                 | 
                                               <?php } ?> 
                                               <!-- Weekdays -->
                                               <?php if(!empty($weekdaysStr)){ 
                                                    echo $weekdaysStr;
                                                 }
                                               ?>
                                              </font>
                                            </td>
                                            </tr>
                                            <tr>
                                              <td height="20" valign="middle"><font face="arial" color="#1e1e1e" style="font-size:13px; font-weight:normal;">&bull;<?php echo $data['IdealRefrence']['name'];?></font></td>
                                            </tr>
                                          </tbody>
                                        </table></td>
                                      </tr>
                                    </tbody>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td style="height:20px">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td style="height:20px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                      <tr>
                                        <td width="206" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td height="23"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;"> Your Name</font></td>
                                              </tr>
                                            <tr>
                                              <td><font face="arial" color="#1e1e1e" style="font-size:14px; font-weight:bold;"><?php echo $data['Appointment']['name'];?></font></td>
                                              </tr>
                                            </tbody>
                                          </table></td>
                                        <td valign="top">&nbsp;</td>
                                        <td width="206" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td height="23"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;"> Email</font></td>
                                              </tr>
                                            <tr>
                                              <td><font face="arial" color="#1e1e1e" style="font-size:14px; font-weight:bold;"><?php echo $data['Appointment']['email'];?></font></td>
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
                                              <td height="23"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;"> Phone</font></td>
                                              </tr>
                                            <tr>
                                              <td><font face="arial" color="#1e1e1e" style="font-size:14px; font-weight:bold;"><?php echo $data['Appointment']['country_code'].' '.$data['Appointment']['phone'];?></font></td>
                                              </tr>
                                            </tbody>
                                          </table></td>
                                        <td valign="top">&nbsp;</td>
                                        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td height="23"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;"> Age</font></td>
                                              </tr>
                                            <tr>
                                              <td><font face="arial" color="#1e1e1e" style="font-size:14px; font-weight:bold;"><?php echo $data['Appointment']['patiant_age'];?> Yrs</font></td>
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
                                              <td height="23"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;"> State</font></td>
                                            </tr>
                                            <tr>
                                              <td><font face="arial" color="#1e1e1e" style="font-size:14px; font-weight:bold;"><?php echo $data['State']['name'];?></font></td>
                                            </tr>
                                          </tbody>
                                        </table></td>
                                        <td valign="top">&nbsp;</td>
                                        <td valign="top">&nbsp;</td>
                                      </tr>
                                    
                                      </tbody>
                                    </table></td>
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
              <td height="32"></td>
            </tr>
            <tr>
              <td>
              <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tbody>
                    <tr>
                      <td style="border-bottom:1px solid #E1E4E8">
                      <table width="480" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tbody>
                        <tr>
                          <td align="center" style="padding-bottom:9px;">
                            <!-- <img src="img/etoslogo2.png" alt="ETOS" title="ETOS"/> -->
                            <?php echo $this->Html->image('emailfooterlogo.png', array('fullBase' => true,'alt'=>'Mind Body Health')); ?>
                          </td>
                        </tr>
                        <tr>
                          <td height="30" align="center"><font face="arial" color="#a0a3a5" style="font-size:13px; font-weight:bold;">Providing Compassionate, Evidence-based Care.</font></td>
                        </tr>
                        <tr>
                          <td height="15">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>

                      </td>
                    </tr>
                    
                    <tr>
                      <td>
                      
                       <table width="520" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tbody>
                      <tr>
              <td height="15"></td>
            </tr>
                        <tr>
                          <td>
                          <table width="520" border="0" cellspacing="0" cellpadding="0">
                              <tbody>
                                <tr>
                                  <td valign="top">
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tbody>
                                        <tr>
                                          <td height="28"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;">
                                            <!-- Email -->
                                            <?php 
                                             echo $this->Html->image('mail.png', array('fullBase' => true,'alt'=>'Email','style'=>['vertical-align:bottom']));
                                            ?>

                                           <!--  <img src="img/mail.png" alt="email" style="vertical-align: bottom" />  -->

                                            <span style="color: #1e1e1e">info@mindbodyva.com</span></font></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                   <td valign="top">
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tbody>
                                        <tr>
                                          <td height="28" align="right"><font face="arial" color="#727271" style="font-size:12px; font-weight:normal;">
                                            <!-- <img src="img/call.png" alt="call" style="vertical-align: bottom"/>  -->
                                            <?php 
                                             echo $this->Html->image('call.png', array('fullBase' => true,'alt'=>'Email','style'=>['vertical-align:bottom']));
                                            ?>
                                            <span style="color: #1e1e1e">571.328.7408 </span></font></td>
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
