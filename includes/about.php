<?php
include_once('../config/symbini.php');
if($LANG_TAG == 'en' || !file_exists($SERVER_ROOT.'/content/lang/about.'.$LANG_TAG.'.php')) include_once($SERVER_ROOT.'/content/lang/about.en.php');
else include_once($SERVER_ROOT.'/content/lang/about.'.$LANG_TAG.'.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
	<head>
	<title><?php echo $DEFAULT_TITLE; ?> <?php echo $LANG['ABOUT'] ?></title>
		<?php
		$activateJQuery = false;
		include_once($SERVER_ROOT.'/includes/head.php');
		?>
	</head>
	<body>
		<?php
		$displayLeftMenu = true;
		include($SERVER_ROOT.'/includes/header.php');
		?>
		<div class="navpath">
			<a href="<?php echo $CLIENT_ROOT; ?>/index.php"><?php echo $LANG['HOME'] ?></a> &gt;&gt;
			<b><?php echo $LANG['ABOUT_PROJ'] ?></b>
		</div>
		<!-- This is inner text! -->
		<div id="innertext">
			<!-- <h1>About This Project</h1><br /> -->
			<?php
				if ($LANG_TAG=='fr'){
			?>
			<h2>Qu’est-ce que le Projet Plantes Tropicales d’Afrique?</h2>
			<div style="margin:20px">
				<p>
					The Tropical African Plants Project is a large-scale effort designed to establish an important new 
					biodiversity data resource. The initiative began with a “proof of concept” project, supported by the 
					JRS Biodiversity Foundation, and led by Prof. Alex Asase (University of Ghana), which resulted in the 
					digitization of more than 250,000 biodiversity data records from European and West African herbaria. 
					The present effort, supported by the U.S. National Science Foundation, will lead to the digitization 
					of more than 1.1M herbarium specimens and associated data records from across tropical Africa housed 
					in 21 U.S. herbaria. Links to both proposals are provided below.
				</p>
			</div>
			<div style="margin:20px">
				<p>JRS 2014: <a href="https://www.dropbox.com/scl/fi/ly4sbxq906117tca8f5ah/JRS_WAfrica_2014.pdf?rlkey=8n7rbdthzeprvbit5dh62trc2&dl=0" target="_blank">West African Plants Project</a> (led by Prof. Alex Asase)</p>
				<p>NSF 2022: <a href="https://www.dropbox.com/scl/fi/lh9di7oo0hek25s8lnf73/African-Plants-2022-Final-Project-Description-only.pdf?rlkey=za4d08n016glut5ls9wjkamhx&dl=0" target="_blank">Tropical African Plants Project</a></p>
			</div>
			<h2>Opportunities</h2>
			<div style="margin:20px">
				<p>
					Our collaborative endeavor offers many opportunities for individuals and institutions around the world 
					to participate in the Tropical African Plants Project. 
				</p>
				<p>
					For researchers and students interested in using the data, they are openly available and accessible via 
					this portal. Individuals with more specialized or larger-scale requests are encouraged to contact the 
					project leadership listed below.
				</p>
				<p>
					Institutions with herbaria and other biocollections interested in contributing data should contact 
					the <a href="https://symbiota.org/" target="_blank">Symbiota Support Hub</a>, which has created 
					and is maintaining the system of portals for biodiversity data.
				</p>
			</div>
			<h2>Contacts</h2>
			<div style="margin:20px">
				<p><b>Lead PI:</b> <a href="town@ku.edu">A. Townsend Peterson</a></p>
				<p><b>Project Manager:</b> <a href="slowell@ku.edu">Samantha Lowell</a></p>
			</div>
			<?php
				}
				if ($LANG_TAG=='pt'){
			?>
			<h2>O que é o Projeto Plantas Tropicais Africanas?</h2>
			<div style="margin:20px">
				<p>
					O Projeto Plantas Tropicais Africanas é um esforço em grande escala concebido para estabelecer 
					um novo e importante recurso de dados sobre a biodiversidade. A iniciativa começou com um projeto 
					de “prova de conceito”, apoiado pela JRS Fundação de Biodiversidade (JRS Biodiversity Foundation) 
					e liderado pelo Prof. Alex Asase (Universidade de Gana), que resultou na digitalização de mais de 
					250.000 registros de dados de biodiversidade de herbários europeus e da África Ocidental. O presente 
					esforço, apoiado pela Fundação Nacional de Ciências dos Estados Unidos, levará à digitalização de 
					mais de 1,1 milhões de espécimes de herbário e registros dos dados associados à África tropical, 
					depositados em 21 herbários dos Estados Unidos. Links para ambas as propostas são fornecidos abaixo.
				</p>
			</div>
			<div style="margin:20px">
				<p>JRS 2014: <a href="https://www.dropbox.com/scl/fi/ly4sbxq906117tca8f5ah/JRS_WAfrica_2014.pdf?rlkey=8n7rbdthzeprvbit5dh62trc2&dl=0" target="_blank">Projeto Plantas da África Ocidental</a> (liderado pelo Prof. Alex Asase)</p>
				<p>NSF 2022: <a href="https://www.dropbox.com/s/soqy53xv6ve6rxm/African%20Plants%202022%20Final%20Reduced.pdf?dl=0" target="_blank">Projeto Plantas Tropicais Africanas</a></p>
			</div>
			<h2>Oportunidades</h2>
			<div style="margin:20px">
				<p>
					O nosso esforço colaborativo oferece muitas oportunidades para indivíduos e instituições de todo 
					o mundo participarem no Projeto Plantas Tropicais Africanas.
				</p>
				<p>
					Para pesquisadores e estudantes interessados em utilizar os dados, esses estão disponíveis e 
					acessíveis através deste portal. Indivíduos com solicitações mais especializadas ou de maior 
					escala são incentivados a entrar em contato com a liderança do projeto abaixo.
				</p>
				<p>
					Instituições com herbários e outras coleções biológicas interessadas em contribuir com dados devem entrar em contato com o 
					<a href="https://symbiota.org/" target="_blank">Symbiota Support Hub</a>, que criou e mantém o sistema de portais de dados 
					de biodiversidade.
				</p>
			</div>
			<h2>Contatos</h2>
			<div style="margin:20px">
				<p><b>PI Principal:</b> <a href="town@ku.edu">A. Townsend Peterson</a></p>
				<p><b>Gestora de Projeto:</b> <a href="slowell@ku.edu">Samantha Lowell</a></p>
			</div>
			<?php
				} else {
			?>
			<h2>What is the Tropical African Plants Project?</h2>
			<div style="margin:20px">
				<p>
					The Tropical African Plants Project is a large-scale effort designed to establish an important new 
					biodiversity data resource. The initiative began with a “proof of concept” project, supported by the 
					JRS Biodiversity Foundation, and led by Prof. Alex Asase (University of Ghana), which resulted in the 
					digitization of more than 250,000 biodiversity data records from European and West African herbaria. 
					The present effort, supported by the U.S. National Science Foundation, will lead to the digitization 
					of more than 1.1M herbarium specimens and associated data records from across tropical Africa housed 
					in 21 U.S. herbaria. Links to both proposals are provided below.
				</p>
			</div>
			<div style="margin:20px">
				<p>JRS 2014: <a href="https://www.dropbox.com/scl/fi/ly4sbxq906117tca8f5ah/JRS_WAfrica_2014.pdf?rlkey=8n7rbdthzeprvbit5dh62trc2&dl=0" target="_blank">West African Plants Project</a> (led by Prof. Alex Asase)</p>
				<p>NSF 2022: <a href="https://www.dropbox.com/s/soqy53xv6ve6rxm/African%20Plants%202022%20Final%20Reduced.pdf?dl=0" target="_blank">Tropical African Plants Project</a></p>
			</div>
			<h2>Opportunities</h2>
			<div style="margin:20px">
				<p>
					Our collaborative endeavor offers many opportunities for individuals and institutions around the world 
					to participate in the Tropical African Plants Project. 
				</p>
				<p>
					For researchers and students interested in using the data, they are openly available and accessible via 
					this portal. Individuals with more specialized or larger-scale requests are encouraged to contact the 
					project leadership listed below.
				</p>
				<p>
					Institutions with herbaria and other biocollections interested in contributing data should contact 
					the <a href="https://symbiota.org/" target="_blank">Symbiota Support Hub</a>, which has created 
					and is maintaining the system of portals for biodiversity data.
				</p>
			</div>
			<h2>Contacts</h2>
			<div style="margin:20px">
				<p><b>Lead PI:</b> <a href="town@ku.edu">A. Townsend Peterson</a></p>
				<p><b>Project Manager:</b> <a href="slowell@ku.edu">Samantha Lowell</a></p>
			</div>
			<?php
				}
			?>
		</div>
		<?php
		include($SERVER_ROOT.'/includes/footer.php');
		?>
	</body>
</html>
