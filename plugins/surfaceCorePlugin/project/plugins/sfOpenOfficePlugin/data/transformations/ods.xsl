<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:office="urn:oasis:names:tc:opendocument:xmlns:office:1.0" xmlns:style="urn:oasis:names:tc:opendocument:xmlns:style:1.0" xmlns:text="urn:oasis:names:tc:opendocument:xmlns:text:1.0" xmlns:table="urn:oasis:names:tc:opendocument:xmlns:table:1.0" xmlns:draw="urn:oasis:names:tc:opendocument:xmlns:drawing:1.0" xmlns:fo="urn:oasis:names:tc:opendocument:xmlns:xsl-fo-compatible:1.0" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:meta="urn:oasis:names:tc:opendocument:xmlns:meta:1.0" xmlns:number="urn:oasis:names:tc:opendocument:xmlns:datastyle:1.0" xmlns:svg="urn:oasis:names:tc:opendocument:xmlns:svg-compatible:1.0" xmlns:chart="urn:oasis:names:tc:opendocument:xmlns:chart:1.0" xmlns:dr3d="urn:oasis:names:tc:opendocument:xmlns:dr3d:1.0" xmlns:math="http://www.w3.org/1998/Math/MathML" xmlns:form="urn:oasis:names:tc:opendocument:xmlns:form:1.0" xmlns:script="urn:oasis:names:tc:opendocument:xmlns:script:1.0" xmlns:ooo="http://openoffice.org/2004/office" xmlns:ooow="http://openoffice.org/2004/writer" xmlns:oooc="http://openoffice.org/2004/calc" xmlns:dom="http://www.w3.org/2001/xml-events" xmlns:xforms="http://www.w3.org/2002/xforms" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0">

<xsl:output method="xml" omit-xml-declaration="yes" version="1.0" encoding="UTF-8" indent="yes"/>

<xsl:strip-space elements="*"/>

<xsl:template match="@*|node()"><xsl:copy><xsl:apply-templates select="@*|node()" /></xsl:copy></xsl:template>

<xsl:template match="@*|node()" mode="dynamic"><xsl:copy><xsl:apply-templates select="@*|node()" /></xsl:copy></xsl:template>

<!-- php output xmlized
	<?= text ?> => <?= xmlspecialchars(text) ?>
	<?php a &amp;&amp; b; echo c; ?> => <?php a && b; echo xmlspecialchars(c); ?>
-->

<xsl:template match="text()[contains(., '&lt;?=')]"><xsl:call-template name="phpechos_text"><xsl:with-param name="node" select="." /></xsl:call-template></xsl:template>

<xsl:template match="text()[contains(., '&lt;?php')]"><xsl:call-template name="php_text"><xsl:with-param name="node" select="." /></xsl:call-template></xsl:template>


<!-- Charts will fetch data from the cells defined in the action variable with the same name as the object name -->
<!-- for now that action variable should be something like Sheet1.D9:Sheet1.D9 -->
<xsl:template match="draw:frame[@draw:name]/draw:object" disable-output-escaping="yes"><xsl:copy><xsl:attribute name="draw:notify-on-update-of-ranges">&lt;?php echo $<xsl:value-of select="../@draw:name" disable-output-escaping="yes"/> ?&gt;</xsl:attribute><xsl:apply-templates select="@*[not(name()='draw:notify-on-update-of-ranges')]" /></xsl:copy></xsl:template>

<!-- Gestion des <?=... -->
<xsl:template name="phpecho"><xsl:param name="node" /><xsl:choose ><xsl:when test="normalize-space($node) != ''">xmlspecialchars( <xsl:value-of select="$node" disable-output-escaping="yes"/>)</xsl:when><xsl:otherwise><xsl:value-of select="$node" disable-output-escaping="yes"/></xsl:otherwise></xsl:choose></xsl:template>

<xsl:template name="phpechos"><xsl:param name="node" /><xsl:choose ><xsl:when test="normalize-space(substring-before($node, '?&gt;')) != ''"><xsl:call-template name="phpecho"><xsl:with-param name="node" select="substring-before($node, '?&gt;')" /></xsl:call-template></xsl:when><xsl:when test="normalize-space(substring-before($node, ';')) != ''"><xsl:call-template name="phpecho"><xsl:with-param name="node" select="substring-before($node, ';')" /></xsl:call-template>;<xsl:call-template name="phpechos"><xsl:with-param name="node" select="substring-after($node, ';')" /></xsl:call-template></xsl:when><xsl:otherwise><xsl:call-template name="phpecho"><xsl:with-param name="node" select="$node" /></xsl:call-template></xsl:otherwise></xsl:choose></xsl:template>

<!-- test(<?=a?>b) => <?=xmlize(a)?>test(b) -->
<xsl:template name="phpechos_text"><xsl:param name="node" /><xsl:value-of select="substring-before($node, '&lt;?=')" disable-output-escaping="no"/>&lt;?= <xsl:call-template name="phpechos"><xsl:with-param name="node" select="substring-before(substring-after($node, '&lt;?='), '?&gt;')" /></xsl:call-template> ?&gt;<xsl:choose ><xsl:when test="contains(substring-after(normalize-space($node), '?&gt;'), '&lt;?=')"><xsl:call-template name="phpechos_text"><xsl:with-param name="node" select="substring-after($node, '?&gt;')" /></xsl:call-template></xsl:when><xsl:when test="contains(substring-after(normalize-space($node), '?&gt;'), '&lt;?php')"><xsl:call-template name="php_text"><xsl:with-param name="node" select="substring-after($node, '?&gt;')" /></xsl:call-template></xsl:when><xsl:otherwise><xsl:value-of select="substring-after($node, '?&gt;')" disable-output-escaping="no"/></xsl:otherwise></xsl:choose></xsl:template>

<!-- Gestion des <?php... -->
<xsl:template name="phptoken"><xsl:param name="node" /><xsl:choose ><xsl:when test="starts-with(normalize-space($node), 'echo')">echo xmlspecialchars( <xsl:value-of select="substring-after($node, 'echo')" disable-output-escaping="yes"/> )</xsl:when><xsl:otherwise><xsl:value-of select="$node" disable-output-escaping="yes"/></xsl:otherwise></xsl:choose></xsl:template>

<xsl:template name="phptokens"><xsl:param name="node" /><xsl:choose ><xsl:when test="normalize-space(substring-before($node, ';')) != ''"><xsl:call-template name="phptoken"><xsl:with-param name="node" select="substring-before($node, ';')" /></xsl:call-template>;<xsl:call-template name="phptokens"><xsl:with-param name="node" select="substring-after($node, ';')" /></xsl:call-template></xsl:when><xsl:otherwise><xsl:call-template name="phptoken"><xsl:with-param name="node" select="$node" /></xsl:call-template></xsl:otherwise></xsl:choose></xsl:template>

<xsl:template name="php_text"><xsl:param name="node" /><xsl:value-of select="substring-before($node, '&lt;?php')" disable-output-escaping="no"/>&lt;?php <xsl:call-template name="phptokens"><xsl:with-param name="node" select="substring-before(substring-after($node, '&lt;?php'), '?&gt;')" /></xsl:call-template> ?&gt;<xsl:choose ><xsl:when test="contains(substring-after(normalize-space($node), '?&gt;'), '&lt;?=')"><xsl:call-template name="phpechos_text"><xsl:with-param name="node" select="substring-after($node, '?&gt;')" /></xsl:call-template></xsl:when><xsl:when test="contains(substring-after(normalize-space($node), '?&gt;'), '&lt;?php')"><xsl:call-template name="php_text"><xsl:with-param name="node" select="substring-after($node, '?&gt;')" /></xsl:call-template></xsl:when><xsl:otherwise><xsl:value-of select="substring-after($node, '?&gt;')" disable-output-escaping="no"/></xsl:otherwise></xsl:choose></xsl:template>

</xsl:stylesheet>
