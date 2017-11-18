-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Abr 07, 2015 as 11:21 PM
-- Versão do Servidor: 5.0.51
-- Versão do PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Banco de Dados: `imobiliaria`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `images`
-- 

CREATE TABLE `images` (
  `id` int(4) NOT NULL auto_increment,
  `imovel` int(4) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `images`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `imoveis`
-- 

CREATE TABLE `imoveis` (
  `id` int(4) NOT NULL auto_increment,
  `tipo` text NOT NULL,
  `cidade` text NOT NULL,
  `bairro` text NOT NULL,
  `negocio` text NOT NULL,
  `imovel` text NOT NULL,
  `descricao` text NOT NULL,
  `preco` text NOT NULL,
  `endereco` text NOT NULL,
  `estado` text NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `imoveis`
-- 

