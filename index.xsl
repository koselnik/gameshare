<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">
<xsl:template match="games">

<html>
  <head>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <meta charset="utf-8"/>
    <title>Gameshare</title>
  </head>
  <body>
    <h1>Gameshare</h1>
    <a href="create.html"><button>Add a game</button></a>
    <table>
      <tr>
        <th>Game name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Created by</th>
        <th>Rating</th>
        <th>Created at</th>
        <th></th>
      </tr>
      <xsl:apply-templates select="game"/>
    </table>
  </body>
</html>
</xsl:template>
<xsl:template match="game">
<tr>
  <td><xsl:value-of select="game_name"/></td>
  <td><xsl:value-of select="description"/></td>
  <td><xsl:value-of select="category"/></td>
  <td><xsl:value-of select="created_by"/></td>
  <td><xsl:value-of select="rating"/></td>
  <td><xsl:value-of select="created_at"/></td>
  <td>
    <a>
      <xsl:attribute name="href">
        <xsl:text> read.php?id=</xsl:text><xsl:value-of select="game_id"/>
      </xsl:attribute>
      <div class="myButton">Read</div>
    </a>
    <a>
      <xsl:attribute name="href">
        <xsl:text> update.php?id=</xsl:text><xsl:value-of select="game_id"/>
      </xsl:attribute>
      <div class="myButton">Change</div>
    </a>
    <a>
      <xsl:attribute name="href">
        <xsl:text> radera.php?id= </xsl:text><xsl:value-of select="game_id"/>
      </xsl:attribute>
      <div class="myButton3">Delete</div>
    </a>
  </td>
</tr>
</xsl:template>
</xsl:stylesheet>
