$(document).ready(function()
{
			//load pesan
			function ambilpesan()
			{
				$(".boxpesan").load("ambil.php");
				var con = document.getElementById("boxpesan");
				con.scrollTop = con.scrollHeight;
			}
			setInterval(ambilpesan,99999);

			//kirim pesan chat
			$("#formpesan").submit(function()
			{
				var pesan=$(".input-xlarge").val();
				$.ajax({
					url : 'kirim.php',
					type : 'POST',
					data : 'pesan='+pesan,
					success : function(pesan)
					{
						// html5 DOM audio play
						var suara=document.getElementById("suara");
						suara.play();
						if(pesan=="terkirim")
						{
							$(".input-xlarge").val("");
						}
						else
						{
							return false;
						}
					},
					});
				return false;
			
			});
			//hide html audio
			var audio=$('#suara');
			audio.hide();
			//load pesan chat
			function ambilpesan()
			{
				$("#boxpesan").load("ambil.php");
				var con = document.getElementById("boxpesan");
				con.scrollTop = con.scrollHeight;
			}
			setInterval(ambilpesan,1000);

			//load emoticon
			$("#emott").popover({
			html: true,
			content: function(){
			// emoticon from www.animated-gifs.eu
			return "<img src='emot/akasmaran.gif' title='[kasmaran]' onClick=\"addemot('[kasmaran]')\">"+
			"<img src='emot/akedip.gif' title='[kedip]' onClick=\"addemot('[kedip]')\">"+
			"<img src='emot/aketawa.gif' title='[ketawa]' onClick=\"addemot('[ketawa]')\">"+
			"<img src='emot/amarah.gif' title='[marah]' onClick=\"addemot('[marah]')\">"+
			"<img src='emot/amelet.gif' title='[melet]' onClick=\"addemot('[melet]')\">"+
			"<img src='emot/anangis.gif' title='[nangis]' onClick=\"addemot('[nangis]')\">"+
			"<img src='emot/asakit.gif' title='[sakit]' onClick=\"addemot('[sakit]')\">"+
			"<img src='emot/bye.gif' title='[bye]' onClick=\"addemot('[bye]')\">"+
			"<img src='emot/maki-maki.gif' title='[maki-maki]' onClick=\"addemot('[maki-maki]')\">"+
			"<img src='emot/marah.gif' title='[cmarah]' onClick=\"addemot('[cmarah]')\">"+
			"<img src='emot/murung.gif' title='[cmurung]' onClick=\"addemot('[cmurung]')\">"+
			"<img src='emot/nangis.gif' title='[cnangis]' onClick=\"addemot('[cnangis]')\">"+
			"<img src='emot/sedih.gif' title='[csedih]' onClick=\"addemot('[csedih]')\">"+
			"<img src='emot/smile.gif' title='[csenyum]' onClick=\"addemot('[csenyum]')\">"+
			"<img src='emot/bonus.png' title='[bonus]' onClick=\"addemot('[bonus]')\">";
			}
			});
			
			
});
// function add emot to chat form
function addemot(emot)
{
	document.forms[0].pesan.value+=" "+emot;
}
