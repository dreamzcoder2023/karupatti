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
            font-size: 14px;
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
        <div style="height:1130px !important;width: 812px !important;font-family: calibri;padding: 56px 37px 75px 60px !important;">
            <div style="height: 359px !important;">
                
            </div>
            <!-- <div style="height: 226px !important;">
                
            </div> -->
            <div style="height: 40px !important;">
                
            </div>
            <!-- <div style="height:545px !important;"> -->
            <div style="height:741px !important;">
                <h4 style="margin: 0px 0px 0px 30px !important;font-size: 16px;text-align: start !important;font-weight: 500 !important;">
                    <span>அனுப்புனர் :</span>
                    <!-- <span style="padding: 30px !important;">ஜீவா</span> -->
                </h4>
                <p style="padding-left:10rem !important;margin: 0px !important; text-align: start;font-size: 16px;line-height: 1.8rem;">
                    <span><?php echo $from; ?></span>
                </p>
                <h4 style="margin: 0px 0px 0px 30px !important;font-size: 16px;text-align: start !important;font-weight: 500 !important;">
                    <span>பெறுநர் :</span>
                </h4>
                <p style="padding-left:10rem !important;margin: 0px !important; text-align: start;font-size: 16px;line-height: 1.8rem;">
                    <span><?php echo $to; ?></span>
                </p>

                <h4 style="margin: 0px 0px 0px 30px !important;font-size: 16px;text-align: start !important;font-weight: 500 !important;">
                    <span>அன்புடையீர்,</span>
                </h4>
                <p style="margin:20px 40px 0px 30px !important;text-align: justify;font-size: 16px;line-height: 1.8rem;">
                    <span>&emsp;&emsp;</span>நான் சாயல்குடி அய்யனார் கோல்டு பேங்கர்ஸ்யில் <span style="font-size: 16px;"><b><?php echo $loan_date;?></b>,</span> தேதியில் <b>ரூபாய் </b><u><span style="font-size: 18px;"><b><?php echo $loan_amt; ?></b></span><b>/-</b></u> க்கு நகைக்கடன் பெற்றிருந்தேன், தற்போது அந்த நகைக்கடன் அட்டைகள் தொலைந்து விட்டதால் அதற்க்கு பதிலாக நகல் அட்டை வழங்குமாறும், அந்த நகை திருப்பிய பின்பு நகையின் பேரில் ஏதேனும் பிரச்சனை ஏற்படும் பட்சத்தில், நானே முழுப் பொறுப்பு ஏற்று கொள்வேன் என்றும் மேலும் நீதிமன்ற பின்னீடு ஏதேனும் ஏற்பாடும் பட்சத்தில் நானே முழுப் பொறுப்பு ஏற்று கொள்வேன் என்றும் இதன் மூலம் உறுதி கூறுகிறேன்.</p>
                <!-- <p style="margin:10px 40px 20px 30px !important;text-align: justify !important;font-size: 18px;line-height: 1.8rem;">
                    <span>&emsp;&emsp;</span> I HAD A JEWELERY LOAN OF RS. <u><span style="font-size: 20px;"><b>50,000.00</b> <b>/-</b>,</span></u> DATED <span style="font-size: 18px;"><b><?php //echo date("d/m/Y");?></b></span> AT SAYALGUDI AYYANAR GOLD BANKERS ACCOUNT NUMBER <u><span style="font-size: 18px;"><b>857496</b></span><b> / </b><span style="font-size: 18px;"><b>23</b></span></u>. AND I HAVE LOST MY PLEDGE REPORT, AND I AM REQUESTING THEM TO GIVE ME A DUPLICATE COPY OF MY JWELL LOAN PLEDGE I HEREBY ASSURE YOU THAT I WILL TAKE FULL RESPONSIBILITY IN CASE OF ANY SETBACK.</p><br> -->
                <div style="margin-top: 4.5rem;">
                    <p style="margin:0px 0px 0px 0px !important;float:left;padding-left: 20px !important;">DETAIL OF THE JEWEL</p>
                    <span style="float:right;padding-right: 85px !important;font-size: 17px;">இப்படிக்கு,</span>
                </div><br>
                <p style="margin:5px 0px 0px 15px !important;float:left;padding-left: 20px !important;width: 350px !important;text-align: left !important;margin-top: 11rem;"><?php echo $pledge_name; ?></p>
                <br><br>
                <table>
                    <tr>
                        <td style="width:67% !important;border-top-style: hidden;border-right-style: hidden;border-bottom-style: hidden;border-left-style: hidden;"></td>
                        <td style="width:33% !important;border-top-style: hidden;border-right-style: hidden;border-bottom-style: hidden;border-left-style: hidden;">
                            <label style="margin:10px 0px 0px 0px !important;display: flex !important;justify-content: center !important;align-items: center !important;">(
                                <span><?php echo $party_name; ?></span>)
                                <!-- <span>சி.ஜீவா</span> 
                                <span>அய்யனார் கோல்டு பேங்கர்ஸ்</span>-->
                            </label>
                        </td>
                    </tr>
                </table>
                <!-- <div>
                    <label style="width:70% !important"> </label>
                    <label style="margin:0px 0px 0px 0px !important;width: 30% !important;display: flex !important;justify-content: end !important;align-items: center !important;">(
                        <span>சி.ஜீவா</span>)
                    </label>
                </div> -->
                <!-- <br><br><br><br>
                <hr style="border: 1px solid black;width:15% !important;left: 44%;position: absolute;margin-left: 17rem !important;"> -->



                <!-- <div>
                    <span style="float:left;padding-left: 20px !important;margin-top: 4rem;">DETAIL OF THE JEWELL</span>
                    <span style="float:right;padding-right: 120px !important;font-size: 17px;margin-top: 4rem;">BY.,</span>
                </div>
                <hr style="border: 1px solid black;width:15% !important;left: 42%;position: absolute;margin-left: 17rem !important;margin-top: 9rem;"> -->
                
            </div>
        </div>
    </center>
</body>
</html>
        
        