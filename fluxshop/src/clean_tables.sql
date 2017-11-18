
CREATE TABLE IF NOT EXISTS `area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_title` varchar(200) DEFAULT NULL,
  `area_url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atributo`
--

CREATE TABLE IF NOT EXISTS `atributo` (
  `atributo_id` int(11) NOT NULL AUTO_INCREMENT,
  `atributo_nome` varchar(100) DEFAULT NULL,
  `atributo_item` int(11) DEFAULT NULL,
  PRIMARY KEY (`atributo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_title` varchar(200) DEFAULT NULL,
  `categoria_url` varchar(200) DEFAULT NULL,
  `categoria_pos` int(11) DEFAULT '0',
  `categoria_icon` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_title`, `categoria_url`, `categoria_pos`, `categoria_icon`) VALUES
(1, 'Telefonia', 'telefonia', 1, 'celphone.png'),
(2, 'Eletrônicos', 'eletronicos', 2, 'eletronico.png'),
(3, 'Utilidades Domésticas', 'utilidades-domesticas', 3, 'domestico.png'),
(4, 'Casa e Jardim', 'casa-e-jardim', 0, 'casa.png'),
(5, 'Escritório', 'escritorio', 0, 'escritorio.png'),
(6, 'Automotivo', 'automotivo', 0, 'car.png'),
(8, 'Informática', 'informatica', 0, 'notebook.png'),
(9, 'TV', 'tv', 0, 'tv.png'),
(10, 'Eletrodomésticos', 'eletrodomesticos', 0, '2eletro.png'),
(11, 'Roupas e Acessórios', 'roupas-e-acessorios', 0, 'jacket.png'),
(12, 'Bebês e Crianças', 'bebes-e-criancas', 0, 'bebe2.png'),
(13, 'Beleza e Saúde', 'beleza-e-saude', 0, 'beleza.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatban`
--

CREATE TABLE IF NOT EXISTS `chatban` (
  `banid` int(11) NOT NULL AUTO_INCREMENT,
  `dtmcreated` datetime DEFAULT '0000-00-00 00:00:00',
  `dtmtill` datetime DEFAULT '0000-00-00 00:00:00',
  `address` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `blockedCount` int(11) DEFAULT '0',
  PRIMARY KEY (`banid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatconfig`
--

CREATE TABLE IF NOT EXISTS `chatconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vckey` varchar(255) DEFAULT NULL,
  `vcvalue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `chatconfig`
--

INSERT INTO `chatconfig` (`id`, `vckey`, `vcvalue`) VALUES
(1, 'dbversion', '1.6.3'),
(2, 'featuresversion', '1.6.4'),
(3, 'title', 'FluxShop'),
(4, 'hosturl', 'http://127.0.0.1/fluxshop_1.5-stable'),
(5, 'logo', ''),
(6, 'usernamepattern', '{name}'),
(7, 'chatstyle', 'simplicity'),
(8, 'chattitle', 'Atendimento Online'),
(9, 'geolink', 'http://api.hostip.info/get_html.php?ip={ip}'),
(10, 'geolinkparams', 'width=440,height=100,toolbar=0,scrollbars=0,location=0,status=1,menubar=0,resizable=1'),
(11, 'max_uploaded_file_size', '100000'),
(12, 'max_connections_from_one_host', '10'),
(13, 'email', 'rafael@clares.com.br'),
(14, 'left_messages_locale', 'en'),
(15, 'sendmessagekey', 'enter'),
(16, 'enableban', '0'),
(17, 'enablessl', '0'),
(18, 'forcessl', '0'),
(19, 'usercanchangename', '1'),
(20, 'enablegroups', '0'),
(21, 'enablestatistics', '1'),
(22, 'enablepresurvey', '1'),
(23, 'surveyaskmail', '1'),
(24, 'surveyaskgroup', '1'),
(25, 'surveyaskmessage', '0'),
(26, 'enablepopupnotification', '0'),
(27, 'showonlineoperators', '0'),
(28, 'enablecaptcha', '0'),
(29, 'online_timeout', '30'),
(30, 'updatefrequency_operator', '2'),
(31, 'updatefrequency_chat', '2'),
(32, 'updatefrequency_oldchat', '7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatgroup`
--

CREATE TABLE IF NOT EXISTS `chatgroup` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `vcemail` varchar(64) DEFAULT NULL,
  `vclocalname` varchar(64) NOT NULL,
  `vccommonname` varchar(64) NOT NULL,
  `vclocaldescription` varchar(1024) NOT NULL,
  `vccommondescription` varchar(1024) NOT NULL,
  `vcuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `chatgroup`
--

INSERT INTO `chatgroup` (`groupid`, `vcemail`, `vclocalname`, `vccommonname`, `vclocaldescription`, `vccommondescription`, `vcuser`) VALUES
(1, 'rafadinix@gmail.com', 'Rafael Clares', 'Rafael Clares', 'Rafael Clares', 'Rafael Clares', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatgroupoperator`
--

CREATE TABLE IF NOT EXISTS `chatgroupoperator` (
  `groupid` int(11) NOT NULL,
  `operatorid` int(11) NOT NULL,
  `vcuser` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chatgroupoperator`
--

INSERT INTO `chatgroupoperator` (`groupid`, `operatorid`, `vcuser`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatmessage`
--

CREATE TABLE IF NOT EXISTS `chatmessage` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `threadid` int(11) NOT NULL,
  `ikind` int(11) NOT NULL,
  `agentId` int(11) NOT NULL DEFAULT '0',
  `tmessage` text NOT NULL,
  `dtmcreated` datetime DEFAULT '0000-00-00 00:00:00',
  `tname` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=208 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatoperator`
--

CREATE TABLE IF NOT EXISTS `chatoperator` (
  `operatorid` int(11) NOT NULL AUTO_INCREMENT,
  `vclogin` varchar(64) NOT NULL,
  `vcpassword` varchar(64) NOT NULL,
  `vclocalename` varchar(64) NOT NULL,
  `vccommonname` varchar(64) NOT NULL,
  `vcemail` varchar(64) DEFAULT NULL,
  `dtmlastvisited` datetime DEFAULT '0000-00-00 00:00:00',
  `istatus` int(11) DEFAULT '0',
  `vcavatar` varchar(255) DEFAULT NULL,
  `vcjabbername` varchar(255) DEFAULT NULL,
  `iperm` int(11) DEFAULT '65535',
  `dtmrestore` datetime DEFAULT '0000-00-00 00:00:00',
  `vcrestoretoken` varchar(64) DEFAULT NULL,
  `vcuser` int(11) DEFAULT '1',
  PRIMARY KEY (`operatorid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `chatoperator`
--

INSERT INTO `chatoperator` (`operatorid`, `vclogin`, `vcpassword`, `vclocalename`, `vccommonname`, `vcemail`, `dtmlastvisited`, `istatus`, `vcavatar`, `vcjabbername`, `iperm`, `dtmrestore`, `vcrestoretoken`, `vcuser`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'user@seusite.com.br', '2014-12-30 08:28:11', 0, '', '', 65520, '2013-05-16 20:02:34', '70a8cd60161a6969079dc2f7a5d87d9e', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatresponses`
--

CREATE TABLE IF NOT EXISTS `chatresponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `vcvalue` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `chatresponses`
--

INSERT INTO `chatresponses` (`id`, `locale`, `groupid`, `vcvalue`) VALUES
(1, 'pt-br', NULL, 'Olá, como posso ajudá-lo?'),
(2, 'pt-br', NULL, 'Olá! Bem vindo ao nosso suporte. Como posso ajudá-lo?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatrevision`
--

CREATE TABLE IF NOT EXISTS `chatrevision` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chatrevision`
--

INSERT INTO `chatrevision` (`id`) VALUES
(277);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatthread`
--

CREATE TABLE IF NOT EXISTS `chatthread` (
  `threadid` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(64) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `agentName` varchar(64) DEFAULT NULL,
  `agentId` int(11) NOT NULL DEFAULT '0',
  `dtmcreated` datetime DEFAULT '0000-00-00 00:00:00',
  `dtmmodified` datetime DEFAULT '0000-00-00 00:00:00',
  `lrevision` int(11) NOT NULL DEFAULT '0',
  `istate` int(11) NOT NULL DEFAULT '0',
  `ltoken` int(11) NOT NULL,
  `remote` varchar(255) DEFAULT NULL,
  `referer` text,
  `nextagent` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(8) DEFAULT NULL,
  `lastpinguser` datetime DEFAULT '0000-00-00 00:00:00',
  `lastpingagent` datetime DEFAULT '0000-00-00 00:00:00',
  `userTyping` int(11) DEFAULT '0',
  `agentTyping` int(11) DEFAULT '0',
  `shownmessageid` int(11) NOT NULL DEFAULT '0',
  `userAgent` varchar(255) DEFAULT NULL,
  `messageCount` varchar(16) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `vcuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`threadid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `chatthread`
--

INSERT INTO `chatthread` (`threadid`, `userName`, `userid`, `agentName`, `agentId`, `dtmcreated`, `dtmmodified`, `lrevision`, `istate`, `ltoken`, `remote`, `referer`, `nextagent`, `locale`, `lastpinguser`, `lastpingagent`, `userTyping`, `agentTyping`, `shownmessageid`, `userAgent`, `messageCount`, `groupid`, `vcuser`) VALUES
(1, 'Marcos Dettmann', '1419381793.2273796382', 'Admin', 1, '2014-12-23 22:43:26', '2014-12-23 22:46:52', 277, 3, 70223067, '188.114.99.201 (187.49.26.243)', 'http://clareslab.com.br/bismark/atendimento/', 0, 'pt-br', '2014-12-23 22:47:12', '2014-12-23 22:46:53', 0, 0, 191, 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nome` varchar(200) DEFAULT NULL,
  `cliente_cpf` varchar(20) DEFAULT NULL,
  `cliente_datan` varchar(20) DEFAULT NULL,
  `cliente_email` varchar(200) DEFAULT NULL,
  `cliente_telefone` varchar(20) DEFAULT NULL,
  `cliente_password` varchar(100) DEFAULT NULL,
  `cliente_sexo` int(11) DEFAULT '1' COMMENT '1 = masc\r\n2 = fem',
  `cliente_celular` varchar(20) DEFAULT NULL,
  `cliente_datacad` varchar(20) DEFAULT NULL,
  `cliente_sobrenome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_site_title` varchar(500) DEFAULT NULL,
  `config_site_description` text,
  `config_site_keywords` text,
  `config_site_menu` int(11) DEFAULT '0' COMMENT '1 = sim',
  `config_site_social` text,
  `config_site_fone1` varchar(40) DEFAULT NULL,
  `config_site_fone2` varchar(40) DEFAULT NULL,
  `config_site_email` varchar(200) DEFAULT NULL,
  `config_site_cep` varchar(20) DEFAULT NULL,
  `config_site_rua` varchar(20) DEFAULT NULL,
  `config_site_num` varchar(20) DEFAULT NULL,
  `config_site_bairro` varchar(200) DEFAULT NULL,
  `config_site_cidade` varchar(200) DEFAULT NULL,
  `config_site_uf` varchar(20) DEFAULT NULL,
  `config_site_complemento` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`config_id`, `config_site_title`, `config_site_description`, `config_site_keywords`, `config_site_menu`, `config_site_social`, `config_site_fone1`, `config_site_fone2`, `config_site_email`, `config_site_cep`, `config_site_rua`, `config_site_num`, `config_site_bairro`, `config_site_cidade`, `config_site_uf`, `config_site_complemento`) VALUES
(1, 'FluxShop', 'Loja de produtos nacionais e importados', 'eletrônicos, presentes, automotivo', 0, '<div class=''shareaholic-canvas'' data-app=''share_buttons'' data-app-id=''5390245''></div> <script type="text/javascript"> var shr = document.createElement("script"); shr.setAttribute("data-cfasync", "false"); shr.src = "//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js"; shr.type = "text/javascript"; shr.async = "true"; shr.onload = shr.onreadystatechange = function() { var rs = this.readyState; if (rs && rs != "complete" && rs != "loaded") return; var site_id = "39e07923cec488add2e8c7d4263934e0"; try { Shareaholic.init(site_id); } catch (e) {console.log(e)} }; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(shr, s); </script>', '11 8888-9999', '5555-4444', 'falecom@fluxshop.com.br', '01021-000', 'Rua Vinte e Cinco de', '1500', 'Centro', 'São Paulo', 'SP', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE IF NOT EXISTS `cupom` (
  `cupom_id` int(11) NOT NULL AUTO_INCREMENT,
  `cupom_alfa` varchar(100) DEFAULT NULL,
  `cupom_status` int(11) DEFAULT '0' COMMENT '1 = ativado',
  `cupom_update` varchar(20) DEFAULT NULL,
  `cupom_lote` int(11) DEFAULT '1',
  `cupom_desconto` int(11) DEFAULT NULL,
  `cupom_pedido` int(11) DEFAULT NULL,
  `cupom_tipo` int(11) DEFAULT '1' COMMENT '1 = desconto do total\r\n2 = desconta frete',
  `cupom_min` int(11) DEFAULT '10',
  `cupom_validade` datetime DEFAULT NULL,
  `cupom_limite` int(11) DEFAULT '1' COMMENT '2 nao',
  PRIMARY KEY (`cupom_id`),
  KEY `fk_cupom_lote` (`cupom_lote`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `endereco_id` int(11) NOT NULL AUTO_INCREMENT,
  `endereco_cliente` int(11) DEFAULT NULL,
  `endereco_rua` varchar(300) DEFAULT NULL,
  `endereco_uf` varchar(2) DEFAULT NULL,
  `endereco_num` varchar(20) DEFAULT NULL,
  `endereco_complemento` varchar(2000) DEFAULT NULL,
  `endereco_cidade` varchar(200) DEFAULT NULL,
  `endereco_bairro` varchar(200) DEFAULT NULL,
  `endereco_tipo` int(11) DEFAULT '1' COMMENT '1 = cobranca',
  `endereco_title` varchar(200) DEFAULT NULL,
  `endereco_cep` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`endereco_id`),
  KEY `fk_end_cliente` (`endereco_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrega`
--

CREATE TABLE IF NOT EXISTS `entrega` (
  `entrega_id` int(11) NOT NULL AUTO_INCREMENT,
  `entrega_valor` varchar(20) DEFAULT NULL,
  `entrega_bairro` varchar(200) DEFAULT NULL,
  `entrega_cidade` varchar(200) DEFAULT NULL,
  `entrega_uf` varchar(10) DEFAULT NULL,
  `entrega_cep` varchar(20) DEFAULT NULL,
  `entrega_tipo` int(11) DEFAULT '1' COMMENT '1 - uf\r\n2 - cidade\r\n3 - bairro',
  `entrega_prazo` varchar(200) DEFAULT '7',
  `entrega_desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`entrega_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `foto_id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_title` varchar(200) DEFAULT NULL,
  `foto_url` varchar(200) DEFAULT NULL,
  `foto_pos` int(11) DEFAULT '0',
  `foto_item` int(11) DEFAULT NULL,
  PRIMARY KEY (`foto_id`),
  KEY `fk_foto_item` (`foto_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=341 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `frete`
--

CREATE TABLE IF NOT EXISTS `frete` (
  `frete_id` int(11) NOT NULL AUTO_INCREMENT,
  `frete_cep_origem` varchar(20) DEFAULT NULL,
  `frete_taxa` double DEFAULT NULL,
  `frete_pac` int(11) DEFAULT '1' COMMENT '1 = ativo',
  `frete_sedex` int(11) DEFAULT '1' COMMENT '1 = ativo',
  `frete_sedexac` int(11) DEFAULT '1' COMMENT '1 = ativo',
  `frete_sedex10` int(11) DEFAULT '1' COMMENT '1 = ativo',
  `frete_prazo` int(11) DEFAULT '9',
  `frete_show_free` int(11) DEFAULT '1' COMMENT '2 = nao',
  `frete_opcoes` int(11) DEFAULT '1' COMMENT '1 = todos\r\n2 = somente entrega\r\n3 = somente retirada',
  PRIMARY KEY (`frete_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `frete`
--

INSERT INTO `frete` (`frete_id`, `frete_cep_origem`, `frete_taxa`, `frete_pac`, `frete_sedex`, `frete_sedexac`, `frete_sedex10`, `frete_prazo`, `frete_show_free`, `frete_opcoes`) VALUES
(1, '29645970', 0, 1, 1, 0, 1, 7, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `iattr`
--

CREATE TABLE IF NOT EXISTS `iattr` (
  `iattr_id` int(11) NOT NULL AUTO_INCREMENT,
  `iattr_atributo` int(11) DEFAULT NULL,
  `iattr_nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iattr_id`),
  KEY `fk_attr_atrib` (`iattr_atributo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_title` varchar(200) DEFAULT NULL,
  `item_desc` text,
  `item_sub` int(11) DEFAULT NULL,
  `item_preco` double DEFAULT NULL,
  `item_keywords` varchar(2000) DEFAULT NULL,
  `item_url` varchar(300) DEFAULT NULL,
  `item_show` int(11) DEFAULT '0' COMMENT '1 = sim',
  `item_oferta` int(11) DEFAULT '0' COMMENT '1 = sim',
  `item_views` int(11) DEFAULT '0',
  `item_categoria` int(11) DEFAULT NULL,
  `item_largura` varchar(20) DEFAULT '12',
  `item_altura` varchar(20) DEFAULT '4',
  `item_comprimento` varchar(20) DEFAULT '16',
  `item_peso` varchar(20) DEFAULT '0.5',
  `item_parc` int(11) DEFAULT '1',
  `item_desconto` double DEFAULT '0',
  `item_calcula_frete` int(11) DEFAULT '2' COMMENT '2 = sim',
  `item_slide` int(11) DEFAULT '0' COMMENT '1 = sim',
  `item_zoom` int(11) DEFAULT '1' COMMENT '0 = nao',
  `item_estoque` int(11) DEFAULT '5',
  `item_destaque` int(11) DEFAULT '1' COMMENT '0 = nao',
  `item_ref` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `fk_item_sub` (`item_sub`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
  `lista_id` int(11) NOT NULL AUTO_INCREMENT,
  `lista_item` int(11) DEFAULT NULL,
  `lista_preco` varchar(100) DEFAULT NULL,
  `lista_title` varchar(200) DEFAULT NULL,
  `lista_pedido` int(11) DEFAULT NULL,
  `lista_qtde` int(11) DEFAULT NULL,
  `lista_foto` varchar(200) DEFAULT NULL,
  `lista_atributos` varchar(2000) DEFAULT '0',
  `lista_atributo_ped` varchar(2000) DEFAULT '0',
  PRIMARY KEY (`lista_id`),
  KEY `fk_list_ped` (`lista_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `lote_id` int(11) NOT NULL AUTO_INCREMENT,
  `lote_num` int(11) DEFAULT '1',
  `lote_size` int(11) DEFAULT '100',
  `lote_nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`lote_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(200) DEFAULT NULL,
  `page_content` text,
  `page_area` int(11) DEFAULT NULL,
  `page_url` varchar(300) DEFAULT NULL,
  `page_show` int(11) DEFAULT '1' COMMENT '2 = nao',
  PRIMARY KEY (`page_id`),
  KEY `fk_page_area` (`page_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pay`
--

CREATE TABLE IF NOT EXISTS `pay` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(100) DEFAULT NULL,
  `pay_key` varchar(100) DEFAULT NULL,
  `pay_user` varchar(100) DEFAULT NULL,
  `pay_pass` varchar(100) DEFAULT NULL,
  `pay_retorno` varchar(200) DEFAULT NULL,
  `pay_status` int(11) DEFAULT '1' COMMENT '2=desativado',
  `pay_url_redir` varchar(600) DEFAULT NULL,
  `pay_fator_juros` varchar(1000) DEFAULT '1.00000, 0.52255, 0.35347, 0.26898, 0.21830, 0.18453, 0.16044, 0.14240, 0.12838, 0.11717, 0.10802, 0.10040 ',
  `pay_texto` text,
  `pay_c1` varchar(200) NOT NULL,
  `pay_c2` varchar(200) NOT NULL,
  `pay_c3` varchar(200) NOT NULL,
  `pay_c4` varchar(200) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `pay`
--

INSERT INTO `pay` (`pay_id`, `pay_name`, `pay_key`, `pay_user`, `pay_pass`, `pay_retorno`, `pay_status`, `pay_url_redir`, `pay_fator_juros`, `pay_texto`, `pay_c1`, `pay_c2`, `pay_c3`, `pay_c4`) VALUES
(1, 'PagSeguro', 'AB0C9F6DAGRT7A4A49F9ACF88E3592CDF56C', 'seuemail@gmail.com', NULL, 'http://localhost/fluxshop/flux-cielo-ok-1.5/notificacao/', 1, NULL, '1.00000, 0.52255, 0.35347, 0.26898, 0.21830, 0.18453, 0.16044, 0.14240, 0.12838, 0.11717, 0.10802, 0.10040', NULL, '', '', '', ''),
(3, 'Cielo', 'e84827130b9837473681c2787007da5914d6359947015a5cdb2b8843db0fa832', '1001734898', '2', 'http://localhost/fluxshop/flux-cielo-ok-1.5/notificacao/', 2, '12', '0', 'Cartão de Crédito', '6', '0', '6', 'visa,mastercard,elo'),
(4, 'Deposito', '6253', 'Itaú, Caixa', '33300.6', 'http://clareslab.com.br/bismark/notificacao/', 1, '', 'Rafael Clares Diniz', 'Banco Caixa Econômica Federal\r\nAgência: 7589\r\nConta Corrente: 12457-6\r\nTitular: Rafael Clares Diniz', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `pedido_id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_data` varchar(20) DEFAULT NULL,
  `pedido_cliente` int(11) DEFAULT NULL,
  `pedido_status` int(11) DEFAULT '2' COMMENT '1 = pendente2 = andamento3 = finalizado',
  `pedido_total_frete` double DEFAULT NULL,
  `pedido_frete` double(10,2) DEFAULT NULL,
  `pedido_prazo` varchar(200) DEFAULT NULL,
  `pedido_tipo_frete` int(11) DEFAULT '1' COMMENT '1 = pac\r\n2 = sedex\r\n3 = sedex10',
  `pedido_pay_code` varchar(200) DEFAULT NULL,
  `pedido_pay_situacao` int(11) DEFAULT '1' COMMENT '1 pendente\r\n2 andamento\r\n3 finalizado\r\n4 cancelado',
  `pedido_pay_url` varchar(500) DEFAULT NULL,
  `pedido_endereco` int(11) DEFAULT NULL,
  `pedido_entrega` int(11) DEFAULT '1' COMMENT '1 = entrega\r\n2 = retirada\r\n',
  `pedido_pay_gw` int(11) DEFAULT '1' COMMENT '1 pagseguro\r\n2 paypal\r\n3 paybrass\r\n4 moip\r\n5 pagtodigital',
  `pedido_pay_meio` varchar(200) NOT NULL,
  `pedido_pay_obs` text,
  `pedido_cupom_alfa` varchar(20) DEFAULT NULL,
  `pedido_cupom_desconto` double DEFAULT '0',
  `pedido_info` text,
  `pedido_obs` text,
  `pedido_cupom_info` varchar(300) DEFAULT NULL,
  `pedido_total_produto` double(10,2) DEFAULT NULL,
  `pedido_codigo_rastreio` varchar(30) DEFAULT NULL,
  `pedido_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pedido_comprovante` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`pedido_id`),
  KEY `fk_ped_cli` (`pedido_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatrr`
--

CREATE TABLE IF NOT EXISTS `relatrr` (
  `relatrr_id` int(11) NOT NULL AUTO_INCREMENT,
  `relatrr_item` int(11) DEFAULT NULL,
  `relatrr_atributo` int(11) DEFAULT NULL,
  `relatrr_iattr` int(11) DEFAULT NULL,
  `relatrr_qtde` int(11) DEFAULT NULL,
  `relatrr_preco` varchar(30) NOT NULL,
  PRIMARY KEY (`relatrr_id`),
  KEY `fk_rel_attr` (`relatrr_atributo`),
  KEY `fk_attr_item` (`relatrr_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `retirada`
--

CREATE TABLE IF NOT EXISTS `retirada` (
  `retirada_id` int(11) NOT NULL AUTO_INCREMENT,
  `retirada_local` varchar(200) DEFAULT NULL,
  `retirada_horario` varchar(200) DEFAULT NULL,
  `retirada_rua` varchar(200) DEFAULT NULL,
  `retirada_num` varchar(20) DEFAULT NULL,
  `retirada_complemento` varchar(200) DEFAULT NULL,
  `retirada_bairro` varchar(200) DEFAULT NULL,
  `retirada_cidade` varchar(200) DEFAULT NULL,
  `retirada_uf` varchar(10) DEFAULT NULL,
  `retirada_cep` varchar(20) DEFAULT NULL,
  `retirada_telefone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`retirada_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `retirada`
--

INSERT INTO `retirada` (`retirada_id`, `retirada_local`, `retirada_horario`, `retirada_rua`, `retirada_num`, `retirada_complemento`, `retirada_bairro`, `retirada_cidade`, `retirada_uf`, `retirada_cep`, `retirada_telefone`) VALUES
(1, 'Loja Boqueirão', 'Seg. a Sex. das 08: as 18:00', 'Avenida Brasil', '500', 'Piso 2', 'Boqueirão', 'Praia Grande', 'SP', '11701-090', '(13) 5555-4444 | (13) 3333-4444'),
(3, 'Loja Suzano', 'Seg. a Sex. das 08: as 18:00', 'Rua Biotônico', '700', 'Térreo', 'Vila Urupês', 'Suzano', 'SP', '08615-000', '(11) 4747-6565 | (11) 4747-8888');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_url` varchar(100) DEFAULT '0',
  `slide_link` varchar(500) DEFAULT NULL,
  `slide_title` varchar(50) DEFAULT NULL,
  `slide_desc` varchar(200) DEFAULT NULL,
  `slide_local` int(11) DEFAULT '1' COMMENT '1= slideshow\r\n2= footer\r\n3= side',
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_url`, `slide_link`, `slide_title`, `slide_desc`, `slide_local`) VALUES
(8, '4141c2acb650fcb9466a28e7facf7eca.jpg', 'http://127.0.0.1/fluxshop', 'Fuga Tempora iusto quis animi', 'Vero rerum magni nobis molestiae', 1),
(33, '52b80251489d56f9e5413ea8f035e90f.png', 'http://clareslab.com.br/bismark/produto/automotivo/tunning/blc-chunyeah-17/70/', ' ', ' ', 2),
(38, '6a993b19c68e3dda712dedecf00c4e32.png', '0', '', '', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `smtp`
--

CREATE TABLE IF NOT EXISTS `smtp` (
  `smtp_id` int(11) NOT NULL AUTO_INCREMENT,
  `smtp_host` varchar(200) DEFAULT NULL,
  `smtp_username` varchar(100) DEFAULT NULL,
  `smtp_password` varchar(100) DEFAULT NULL,
  `smtp_fromname` varchar(200) DEFAULT NULL,
  `smtp_bcc` varchar(100) DEFAULT NULL,
  `smtp_replyto` varchar(100) DEFAULT NULL,
  `smtp_port` int(11) DEFAULT NULL,
  PRIMARY KEY (`smtp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `smtp`
--

INSERT INTO `smtp` (`smtp_id`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_fromname`, `smtp_bcc`, `smtp_replyto`, `smtp_port`) VALUES
(1, 'mail.seusite.com.br', 'abuse@seusite.com.br', '', 'SeuNome', '', 'resp@gmail.com', 587);

-- --------------------------------------------------------

--
-- Estrutura da tabela `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `social_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_fb` text,
  `social_tw` text,
  `social_in` text,
  `social_gp` text,
  `social_f4` text,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `social`
--

INSERT INTO `social` (`social_id`, `social_fb`, `social_tw`, `social_in`, `social_gp`, `social_f4`) VALUES
(1, 'https://www.facebook.com/pages/Clares/1422630524625405', '<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/rafaelclares" data-widget-id="393233237394194433">Tweets by @rafaelclares</a>\r\n<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?''http'':''https'';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>\r\n', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub`
--

CREATE TABLE IF NOT EXISTS `sub` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_title` varchar(200) DEFAULT NULL,
  `sub_url` varchar(200) DEFAULT NULL,
  `sub_pos` int(11) DEFAULT '0',
  `sub_categoria` int(11) DEFAULT NULL,
  `sub_icon` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `fk_sub_categoria` (`sub_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Extraindo dados da tabela `sub`
--

INSERT INTO `sub` (`sub_id`, `sub_title`, `sub_url`, `sub_pos`, `sub_categoria`, `sub_icon`) VALUES
(1, 'Smartphones', 'smartphones', 1, 1, 'iphone.png'),
(2, 'Roda Aro 30', 'roda-aro-30', 0, 6, NULL),
(5, 'DVD', 'dvd', 0, 6, NULL),
(6, 'Tunning', 'tunning', 0, 6, NULL),
(7, 'Vasos', 'vasos', 0, 4, NULL),
(8, 'Cadeiras', 'cadeiras', 0, 5, NULL),
(9, 'Notebooks', 'notebooks', 0, 8, 'notebook.png'),
(10, 'Tablets', 'tablets', 0, 8, 'tablet.png'),
(12, 'LED LCD', 'led-lcd', 0, 9, 'tvwide.png'),
(13, 'Acessórios de cozinha', 'acessorios-de-cozinha', 0, 3, 'eletro.png'),
(14, 'Lavadoras de Roupas', 'lavadoras-de-roupas', 0, 10, NULL),
(15, 'Regata', 'regata', 0, 11, NULL),
(16, 'Brinquedos', 'brinquedos', 0, 12, NULL),
(17, 'Carrinho de Bebê', 'carrinho-de-bebe', 0, 12, NULL),
(18, 'Berços', 'bercos', 0, 12, NULL),
(19, 'Alimentação', 'alimentacao', 0, 12, NULL),
(20, 'Higiene', 'higiene', 0, 12, NULL),
(21, 'Segurança', 'seguranca', 0, 12, NULL),
(22, 'Vestidos', 'vestidos', 0, 11, NULL),
(23, 'Bodies', 'bodies', 0, 11, NULL),
(24, 'Refrigeradores', 'refrigeradores', 0, 10, NULL),
(25, 'Depuradores de Ar', 'depuradores-de-ar', 0, 10, NULL),
(26, 'Cooktops', 'cooktops', 0, 10, NULL),
(27, 'Secadores', 'secadores', 0, 13, NULL),
(28, 'Barbeadores', 'barbeadores', 0, 13, NULL),
(29, 'Balanças', 'balancas', 0, 13, NULL),
(30, 'Telefone sem fio', 'telefone-sem-fio', 0, 1, NULL),
(31, 'Celulares Desbloqueados', 'celulares-desbloqueados', 0, 1, NULL),
(32, 'Aspiradores de Pó', 'aspiradores-de-po', 0, 3, NULL),
(33, 'Bebedouros', 'bebedouros', 0, 3, NULL),
(34, 'Aparadores de Grama', 'aparadores-de-grama', 0, 4, NULL),
(35, 'Churrasqueiras', 'churrasqueiras', 0, 4, NULL),
(36, 'Smart TV', 'smart-tv', 0, 9, NULL),
(37, 'Tv Plasma', 'tv-plasma', 0, 9, NULL),
(38, 'TV 3D', 'tv-3d', 0, 9, NULL),
(39, 'Multifuncionais', 'multifuncionais', 0, 8, NULL),
(40, 'Ultrabooks', 'ultrabooks', 0, 8, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(20) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_name` varchar(200) DEFAULT NULL,
  `user_level` int(11) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_password`, `user_email`, `user_name`, `user_level`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user@seusite.com.br', 'admin', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `versao`
--

CREATE TABLE IF NOT EXISTS `versao` (
  `versao_num` int(5) DEFAULT NULL,
  `versao_data` varchar(20) DEFAULT NULL,
  `versao_update` varchar(20) DEFAULT NULL,
  `versao_id` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`versao_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `versao`
--

INSERT INTO `versao` (`versao_num`, `versao_data`, `versao_update`, `versao_id`) VALUES
(40, '10-05-2015', '1.7', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cupom`
--
ALTER TABLE `cupom`
  ADD CONSTRAINT `fk_cupom_lote` FOREIGN KEY (`cupom_lote`) REFERENCES `lote` (`lote_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_end_cliente` FOREIGN KEY (`endereco_cliente`) REFERENCES `cliente` (`cliente_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `fk_foto_item` FOREIGN KEY (`foto_item`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `iattr`
--
ALTER TABLE `iattr`
  ADD CONSTRAINT `fk_attr_atrib` FOREIGN KEY (`iattr_atributo`) REFERENCES `atributo` (`atributo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_sub` FOREIGN KEY (`item_sub`) REFERENCES `sub` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `fk_list_ped` FOREIGN KEY (`lista_pedido`) REFERENCES `pedido` (`pedido_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `fk_page_area` FOREIGN KEY (`page_area`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_ped_cli` FOREIGN KEY (`pedido_cliente`) REFERENCES `cliente` (`cliente_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `relatrr`
--
ALTER TABLE `relatrr`
  ADD CONSTRAINT `fk_attr_item` FOREIGN KEY (`relatrr_item`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rel_attr` FOREIGN KEY (`relatrr_atributo`) REFERENCES `atributo` (`atributo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sub`
--
ALTER TABLE `sub`
  ADD CONSTRAINT `fk_sub_categoria` FOREIGN KEY (`sub_categoria`) REFERENCES `categoria` (`categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

