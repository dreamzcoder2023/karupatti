<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            font-family: Calibri;
            font-size: 14px;
        }
        .ft_wgt{
            font-weight: 600;
        }
        table{
            border-collapse: collapse;width: 100%;
        }
        table tr,td,th{
            border: 1px solid black;
        }
        #base{
            font-family: Calibri;
            font-size: 16px;
        }
        #base tr{
            height: 16px;
        }
        h2{
            height: 10px !important;
        }
        .padd{
            padding: 2px;
        }
        .rw{
                padding-top: calc(0.775rem + 1px);
                padding-bottom: calc(0.775rem + 1px);
                line-height: 1.5;
        }
    </style>
</head>
<body>
    <center>
        <div style="height:1311px !important;width: 813px !important;font-family: calibri;padding: 19px !important;">
            <div style="border: 1px solid black;height:1311px !important;">
                <div style="height:515px !important;">
                    <table id="base">
                        <tr>
                            <td style="width: 30px;height: 30px;border-top-style: hidden;border-left-style: hidden;" rowspan="4"><img src="./assets/images/logo-1.jpg" width="110" height="110"></td>
                            <td style="border-bottom-style: hidden;border-top-style: hidden;font-size: 23px;padding-left:5px;font-weight: 800 !important;text-align: center;">AGB - AYYANAR GOLD BANK</td>
                            <td rowspan="4" class="ft_wgt" style="white-space:nowrap;border-right-style: hidden;border-top-style: hidden;"><center><span>DATE</span><br>
                                <label><?php echo date("d-M-Y"); ?></label></center></td>
                        </tr>
                        <tr>
                            <td class="ft_wgt" style="border-bottom-style: hidden;white-space:nowrap;padding-left:5px;text-align: center;font-size: 16px;"><span>10/72 Thoothukudi Road, Ramanathapuram - 623120</span></td>
                        </tr>
                        <tr>
                            <td class="ft_wgt" style="border-bottom-style: hidden;padding-left:5px;text-align: center;"><span>+91 6383243448</span>&nbsp;|&nbsp;<span>+91 9843428169</span>&nbsp;|&nbsp;<span>+91 9942230385</span></td>
                        </tr>
                        <tr>
                            <td class="ft_wgt" style="padding-left:5px;text-align: center;"><span>License No &nbsp;- <label>33AXLPA4248E1ZU</label></span></td>
                        </tr>
                    </table>
                    <h4 style="font-size:20px;margin-top: 3px !important;margin-bottom: 3px !important;font-weight: 500;"><center><b>FORM MISSING &nbsp;&nbsp; - &nbsp;&nbsp; CUSTOMER COPY</b></center></h4>
                    <div style="display:flex;justify-content: end !important;align-items: center !important;padding-right: 10px;">
                        <img src="./assets/images/legal_doc_barcode.png" style="height: 40px !important;width: 200px !important;">
                        <!-- <h4 style="margin: 0px 10px 0px 0px !important;font-size: 16px;">
                            <span>MRG &nbsp; - &nbsp;</span>
                            <span></span>
                            <span>/<?php //echo date("y");?></span>
                        </h4> -->
                    </div>
                    <p style="margin:10px 40px 10px 30px !important;text-align: justify !important;font-size: 16px;line-height: 1.5rem;">
                        <span>&emsp;&emsp;</span>THIS FORM STATES THAT THE JEWELL LOAN PLEDGE OF THE MR/MRS. <span style="font-size: 18px;"><b><?php echo $party_name; ?></b>,</span> ACCOUNT NUMBER <u><span style="font-size: 18px;"><b><?php echo $loan_no; ?></b></span></u> HAS BEEN LOST AND THE COMPANY IS GIVING HIM A NEW DUPLICATE PLEDGE FOR HIS ACKNOWLEDGEMENT, AND HE WILL BE CHARGED <b>RS.100</b> AS PER THE COMPANY NORMS, FOR LOOSING THE PLEDGE,AND ALSO THE COMPANY IS NOT RESPONSIBLE FOR THE OLD PLEDGE THAT HE LOST, THE SERIAL NUMBER OF THE OLD PLEDGE WILL BE CHANGED., AND THIS COPY WILL BE ACT AS A NEW DUPLICATE PLEDGE OF THE PARTICULAR ACCOUNT.</p>
                    <p style="margin:0px 40px 0px 30px !important;text-align: justify !important;font-size: 15px;line-height: 1.7rem;">
                        <span>&emsp;&emsp;</span>இந்த படிவம் திரு/திருமதி. <span style="font-size: 18px;"><b><?php echo $party_name; ?></b>,</span> நகை கடன் <span><b><?php echo IND_money_format($loan_amt);?></b>/-</span>, கணக்கு எண் <u><span style="font-size: 18px;"><b><?php echo $loan_no; ?></b></span></u> தொலைந்து விட்டதால் நிறுவனம் அவருக்கு ஒரு புதிய நகல் அளிக்கிறது, மேலும் நிறுவன விதிமுறையின்படி <b>ரூபாய் 100</b> கட்டணம் வசூலிக்கப்பட்டுள்ளது, அதேபோல் தொலைந்த அட்டைக்கு கம்பெனி பொறுப்பில்லை, பழைய அட்டையின் தொடர்ச்சியான எண் மாற்றப்பட்டுவிட்டது ஆகையால் இன்றுமுதல் பழைய நம்பர் உள்ள அட்டை செல்லாது. எனவே இன்று முதல் இந்த படிவம் புதிய நகல் ஆகா மதிக்கப்படும்.</p>
                </div>
                <hr style="border-bottom: 1px black dashed;">
                <div style="height:770px !important;">
                    <h4 style="font-size:20px;margin-top: 3px !important;margin-bottom: 3px !important;font-weight: 500;"><center><b>FOR OFFICIAL USE ONLY</b></center></h4>
                    <div style="display:flex;justify-content: end !important;align-items: center !important;padding-right: 10px;">
                        <img src="./assets/images/legal_doc_barcode.png" style="height: 40px !important;width: 200px !important;">
                        <!-- <h4 style="margin: 0px 10px 0px 0px !important;font-size: 16px;">
                            <span>MRG &nbsp; - &nbsp;</span>
                            <span></span>
                            <span>/<?php //echo date("y");?></span>
                        </h4> -->
                    </div>
                    <h4 style="margin: 0px 0px 0px 30px !important;font-size: 16px;text-align: start !important;font-weight: 500 !important;">
                        <span>அனுப்புனர் :</span>
                        <!-- <span style="padding: 30px !important;">ஜீவா</span> -->
                    </h4>
                    <p style="padding-left:10rem !important;margin: 0px !important; text-align: start;font-size: 15px;line-height: 1.7rem;">
                        <span><?php echo $from; ?></span><br>
                    </p>
                    <h4 style="margin: 0px 0px 0px 30px !important;font-size: 16px;text-align: start !important;font-weight: 500 !important;">
                        <span>பெறுநர் :</span>
                    </h4>
                    <p style="padding-left:10rem !important;margin: 0px !important; text-align: start;font-size: 15px;line-height: 1.7rem;">
                        <span><?php echo $to; ?></span><br>
                    </p>
                    <h4 style="margin: 0px 0px 0px 30px !important;font-size: 16px;text-align: start !important;font-weight: 500 !important;">
                        <span>அன்புடையீர்,</span>
                    </h4>
                    <p style="margin:10px 40px 0px 30px !important;text-align: justify;font-size: 15px;line-height: 1.7rem;">
                        <span>&emsp;&emsp;</span>நான் சாயல்குடி அய்யனார் கோல்டு பேங்கர்ஸ்யில் <span style="font-size: 18px;"><b><?php echo $loan_date;?></b>,</span> தேதியில் <b>ரூபாய் </b><u><span style="font-size: 18px;"><b><?php echo IND_money_format($loan_amt); ?></b></span><b> /-</b></u> க்கு நகைக்கடன் பெற்றிருந்தேன், தற்போது அந்த நகைக்கடன் அட்டைகள் தொலைந்து விட்டதால் அதற்க்கு பதிலாக நகல் அட்டை வழங்குமாறும், அந்த நகை திருப்பிய பின்பு நகையின் பேரில் ஏதேனும் பிரச்சனை ஏற்படும் பட்சத்தில், நானே முழுப் பொறுப்பு ஏற்று கொள்வேன் என்றும் மேலும் நீதிமன்ற பின்னீடு ஏதேனும் ஏற்பாடும் பட்சத்தில் நானே முழுப் பொறுப்பு ஏற்று கொள்வேன் என்றும் இதன் மூலம் உறுதி கூறுகிறேன்.</p>
                    <p style="margin:10px 40px 10px 30px !important;text-align: justify !important;font-size: 16px;line-height: 1.5rem;">
                        <span>&emsp;&emsp;</span> I HAD A JEWELERY LOAN OF RS. <u><span style="font-size: 18px;"><b><?php echo IND_money_format($loan_amt); ?></b> <b>/-</b>,</span></u> DATED <span style="font-size: 18px;"><b><?php echo $loan_date;?></b></span> AT SAYALGUDI AYYANAR GOLD BANKERS ACCOUNT NUMBER <u><span style="font-size: 18px;"><b><?php echo $loan_no; ?></b></span></u>. AND I HAVE LOST MY PLEDGE REPORT, AND I AM REQUESTING THEM TO GIVE ME A DUPLICATE COPY OF MY JEWEL LOAN PLEDGE I HEREBY ASSURE YOU THAT I WILL TAKE FULL RESPONSIBILITY IN CASE OF ANY SETBACK.</p>
                    <div>
                        <p style="margin:0px 0px 0px 0px !important;float:left;padding-left: 30px !important;"><b>DETAIL OF THE JEWEL</b></p>
                        <span style="float:right;padding-right: 125px !important;font-size: 17px;">BY.,</span>
                    </div><br>
                    <p style="margin:5px 0px 0px 15px !important;float:left;padding-left: 30px !important;width: 350px !important;text-align: left !important;"><?php echo $pledge_name; ?></p>
                    <br><br><br>
                    <hr style="border: 1px solid black;width:15% !important;left: 42%;position: absolute;margin-left: 17rem !important;">
                </div>
            </div>
        </div>
    </center>
</body>
</html>
        
        