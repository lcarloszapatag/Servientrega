var _gaq = _gaq || [];
_gaq.push([ '_setAccount', 'UA-25318717-1' ]);
_gaq.push([ '_trackPageview' ]);
(function() {
	var ga = document.createElement('script');
	ga.type = 'text/javascript';
	ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl'
			: 'http://www')
			+ '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(ga, s);
})();
function Enviar(guia, correo) {
	window
			.open(
					"http://sismilenio.servientrega.com.co/servicio_cliente/rastreo/digital.asp?numero_guia="
							+ guia + "&CorreoCliente=" + correo, "Digital",
					"width=753,height=460,scrollbars=yes,menubar=yes,location=no");
}
function Enviar(guia, correo, idPais) {
	if (idPais == null || idPais == 1)
		window
				.open(
						"http://sismilenio.servientrega.com/WebAtencioncliente/Rastreo/ImagenGuia.aspx?esConsulta=&sinControlLlamada=SI&numGuia="
								+ guia + "&CorreoCliente=" + correo, "Digital",
						"width=753,height=460,scrollbars=yes,menubar=yes,location=no");
	if (idPais == 2)
		window.open(
				"http://192.168.200.35/servicio_cliente/rastreo/digital.asp?numero_guia="
						+ guia + "&CorreoCliente=" + correo, "Digital",
				"width=753,height=460,scrollbars=yes,menubar=yes,location=no");
}

function closeWindows(){
	window.parent.document.getElementById('divRastreoEnvio').style.display="none";
}

if(window.PrimeFaces){PrimeFaces.settings.locale='es';PrimeFaces.settings.validateEmptyFields=true;PrimeFaces.settings.considerEmptyStringNull=false;}