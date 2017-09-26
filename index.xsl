<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns="http://www.w3.org/1999/xhtml">
<xsl:template match="games">

<html>
  <head>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <meta charset="utf-8"/>
    <title>Gameshare</title>
  </head>
  <body>
    <h1>Gameshare</h1>
    <ul>
      <xsl:apply-templates select="Post-it"/>
    </ul>
    <a href="Insert.html"><button>Add a game</button></a>
  </body>
</html>
</xsl:template>
<xsl:template match="game">
<li>
  <a>
    <xsl:attribute name="href">
      <xsl:text> andradatabas.php?id=</xsl:text><xsl:value-of select="game_id"/>
    </xsl:attribute>
    <div class="myButton">Change</div>
  </a>
  <a>
    <xsl:attribute name="href">
      <xsl:text> radera.php?id= </xsl:text><xsl:value-of select="game_id"/>
    </xsl:attribute>
    <div class="myButton3">Delete</div>
  </a>
  <h2><strong><xsl:value-of select="category"/></strong></h2><br/>
  <xsl:value-of select="description"/><br/><br/>
  <xsl:value-of select="game_name"/><br/>
  <xsl:value-of select="rating"/><br/>
  <xsl:value-of select="created_by"/><br/>
</li>
</xsl:template>


</xsl:stylesheet>
