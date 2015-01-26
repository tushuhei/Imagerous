#coding: utf8

import MySQLdb

def connect_db():
  con = MySQLdb.connect(
      db="imagerous",
      host="localhost",
      user="root",
      passwd="",
      charset="utf8",
      use_unicode=True)
  con.autocommit(True)
  return con.cursor(MySQLdb.cursors.DictCursor)
