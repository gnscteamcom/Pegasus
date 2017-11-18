<?php if (!defined('SITE_ROOT')) exit; ?>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title><?php echo $CONFIG['SiteTitle']; ?></title>
		<meta name="robots" content="noindex">
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
		<meta http-equiv="PRAGMA" content="NO-CACHE">
		<link href="<?php echo themePath('style.css'); ?>?nocache" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id='ErrorWin'>
			<div id='ErrorWinCont'>
				<div role='icon'>
					<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHMAAABRCAYAAADhJ5nbAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOwwAADsMBx2+oZAAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNui8sowAAAAWdEVYdENyZWF0aW9uIFRpbWUAMDYvMDgvMTXRyD97AAAFCUlEQVR4nO2dv0scaRjHv8+7CqYQJFaBawIGkn035GDBawKJaWKZZg0khQEV4n8QXMPdEXexvC4BFWIRi2wjpDHNnYE0J6wYshMsAmnuSg/BwkJ3niucEX/Mzu7M7uy8+/J8utl55/UrH973nXnnnRliZkSBiDIL2exjBsauDQzcAHAvrPw/h4eR6m+Vn65cifV3Lh7XDu38bw1yfAKwA2Bzenv7AzPXo9RJrcpczOVGjpjLzDzOwGBIoHOIzHg5/j08PCCijX6iuRe12vdW6mwqs6T1sAu8dpkLUQMBIjNujrN1K6KKAmaLjrMXdowK21nS+kmd+UeQSKF7uMyFOvOPktZPwso1lLmg9dIx8zu/SxXShYHBY+Z3C1ovNSoTKPOV1u/rzNPJRRPiUmeefqX1+6B9l2QuaL0k3arZuMyFoBZ6TqY3RkqL7AHqzNMXx9BTmSWth+vMb7ofS4hLnflNSethf/tUpgu8lpOd3oKBQRd47W8r4GRCQMbJ3sRlLizmciOAJ/OIuZxuJKEdfH+qpPUwM4+nHUiIDzOPl7QeVgAeyljZ23j+HioGxtIOI7TPMfMDxcDttIMIHeG2cpl/STuF0BFGQ++aCL2FyLSIvrQDBOHdjF0nov8AgJmvusCjFCY2VgGsA9j3tocAPAIw2eUcLWGUTEW0myGanKvVtgJ2r5VzudE686rLfDPhKF8APJuqVncC9q2v5PN/AHgL4E7COSJhTDeriHYVcLeBSADAXK22pYC7img3wShfANxvIBIA4O27n3COyBgjM0M02WyNCwAUHWcvQ5RkN/dsqlrdb1ZoqlrdTzhHZIyQqYgqYS3yIl7Z1QSirIa1yKAciqiSQI5YmCHz5CQjKnGO6XidMbMnghEy/bPWiDTtCrtRZ8zsiWCETKEzGCGTma/GOGyo40Fi1BkzeyIYIdM9uRCPSpxjOl5nzOyJYIZM5kI5lxtttbxXNonLgsmVfP7nKDlMWm5jhEwAqDOvnl1p1ghvFWESlyU+b1fy+abd7Uo+P5RwjsgYI9NlvukCn8NaaDmXG3WBzwlP590BsBnWQr19m12YVowE/XbrVrQHNM+Q1FNgrUy0d+kpsNCJ9m49BdYqRk20+7jMBRcoIOKDwAkwCUPvkARhTDcrtI/ItAiRaREi0yJEpkWITIsQmRYhMi1CZFqEyLQIkWkRItMiRKZFiEyLEJkWITItQmRahMi0CJFpESLTIkSmRRi5Ou/Xb98o7QxhrOTzqS8bDEJapkWITIsQmRYhMi1CZFqEkWezv2ezTc8WTfh8lGlIy7QIkWkRItMilCL6O+0QQkfYUgR8TTuF0BG+KgL+SjuF0D59RH8qAB8JOEg7jBAfz99HVXScPSLaSDuQEB8i2ig6zp4CgH6iubQDCfHx/SkAeFGrfTfpvalC6yiiiv+1+NPrTAXMytjZWxBwoIBZf/tUpve67OfpxBLikCF6fvZV6OdmgIqOs5YhWu5+LCEqGaLlouOsnf3t0nTevOPMyPhpNoqoMu84M5d+Dyr80nEmpIWaSYZo+aXjTATtazjRPu84M31ET+WkyAwIOOgjehrUIn1C75p4Y+h16XbTRRFVMkTXL46RF2m60sA7W5pYzOVGjpjLzDwuX8JNHgIOiGijn2jOv45segxHfA0oEWUWstnHDIxdGxi4AeBeWPl23skahgnLRhJ43+wnADsANqe3tz8wcz1Knf8DO/veLNUZ79wAAAAASUVORK5CYII=' width='115' height='81'>
				</div>
				<div role='texterror'>Ei, ocorreu um erro. O Player não pode ser exibido.</div>
				<div role='options'>Verifique o arquivo de informações do filme/série.<br>E certifique-se de que parametro enviado pela url está correto.<br>Contate o administrador do Site para verificar esse error.</div>
			</div>
		</div>
	</body>
</html>