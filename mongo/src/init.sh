mongo << EOF
use nosqli
db.createCollection('sqli')
db.sqli.insert({name:"bi0x", age:21, passwd:"biox2333"})
db.sqli.insert({name:"xux", age:19, passwd:"xux2333"})
db.sqli.insert({name:"peco", age:21, passwd:"peco2333"})
db.sqli.insert({name:"k0nashi", age:21, passwd:"konashi2333"})
EOF