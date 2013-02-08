<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<HTML>
<HEAD>
	
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE><?php echo $this->getI18NString('list.title', $this->getModuleName().' list') ?></TITLE>
	<META NAME="GENERATOR" CONTENT="OpenOffice.org 2.4  (Linux)">
	<META NAME="AUTHOR" CONTENT="Surface Generator">
	<META NAME="CREATED" CONTENT="20080902;15565700">
	<META NAME="CHANGED" CONTENT="0;0">
	
	<STYLE>
		<!-- 
		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Nimbus Sans L"; font-size:x-small }
		 -->
	</STYLE>
	
</HEAD>

<BODY TEXT="#000000">
<TABLE FRAME=VOID CELLSPACING=0 RULES=NONE BORDER=0>
	<THEAD>
		<TR>
		[?php include_document_partial(	'<?php echo $this->getModuleName() ?>/list_th',	array()) ?]
		</TR>
	</THEAD>
	<TBODY>
	[?php foreach($<?php echo $this->getPluralName() ?> as $<?php echo $this->getSingularName() ?>): ?]
		<TR>
	    [?php include_document_partial(	'<?php echo $this->getModuleName() ?>/list_td',
										array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>,
											  'page' => null,	
										))
		?]
		</TR>
	[?php endforeach; ?]
	</TBODY>
</TABLE>
<!-- ************************************************************************** -->
</BODY>

</HTML>