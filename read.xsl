<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">
<xsl:template match="game">
<html>
  <head>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <meta charset="utf-8"/>
    <title>Gameshare</title>
  </head>
  <body>
    <h1><xsl:value-of select="game_name"/></h1>
    <div class="image">
      <img>
        <xsl:attribute name="src">
          <xsl:value-of select="image"/>
        </xsl:attribute>
      </img>
    </div>
    <p><xsl:value-of select="description"/></p>
    <td><xsl:value-of select="category"/></td>
    <td><xsl:value-of select="created_by"/></td>
    <td><xsl:value-of select="rating"/></td>
    <td><xsl:value-of select="created_at"/></td>
    <a class="btn" href="index.php">Back</a>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>
