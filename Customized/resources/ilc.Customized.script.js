//LDAP Status
   $(document).ready(function(){
   	check_ldap_status();
   });
function check_ldap_status(){
    $.ajax({
            type: 'POST',
            url: "/ldapstatus.php",
            datatype:'JSON',
            cache: false,
            success: function(data){
		let d = JSON.parse(data);
		console.log(d.connection);
		if(d.connection === true){
		     $('#userloginForm').append('DilNet Access: <span style="background-color: green;height:15px;width:15px;border-radius: 50%;display:inline-block;vertical-align: -2px;"></span>');
		} else {
		     $('#userloginForm').append('DilNet Access: <span style="background-color: red;height:15px;width:15px;border-radius: 50%;display:inline-block;vertical-align: -2px;"></span>');
		}
            },
            error: function(data){
                    console.log(data);
            }
    });
}
//Accept Privacy policy
   $(document).on('click','.btn-accept-policy', function(e){
           e.preventDefault();
           footer_data_privacy('accepted');
   });
//Load Footer Data Privacy
footer_data_privacy('');
function footer_data_privacy(datas){
    $.ajax({
            type: 'POST',
            url: "/user_accept_policy.php",
            data: {
                    accept: (datas == '') ? '' : datas
            },
            datatype:'JSON',
            cache: false,
            success: function(data){
                    var ddata = JSON.parse(data);
                    var dhtml = '<div class="agreement-policy" style="width: 100%;background-color: rgb(1, 46, 86); color: rgb(255, 255, 255);text-align:center;padding: 1rem;position: fixed;bottom:0;opacity:0.8;z-index:100000;">'
                        + '<p style="font-size:11pt !important;margin-top:0px;">By clicking "Accept" or continuing to use our site, you agree to the university\'s Acceptable Use Policy and this site\'s terms and conditions.</p>'
                        + '<span class="btn-accept-policy" style="height:3rem;width:6rem;background-color:#fff;color:#000;margin:0;padding:.3rem;cursor:pointer;">Accept</span>'
                        + '<a href="https://upd.edu.ph/aup/" target="_blank" class="btn-uap" style="height:3rem;width:6rem;background-color:#fff;color:#000;margin:0;margin-left:2px;padding:.3rem;cursor:pointer;">Acceptable Use Policy</a></div>';
                        if(ddata.privacy == 1){
                                $('.agreement-policy').hide();
                        } else {
                                $('html').append(dhtml).show();
                        }
                    console.log(data);
            },
            error: function(data){
                    console.log(data);
            }
    });
};
