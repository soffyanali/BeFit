


#install.packages('RMySQL')
require(RMySQL) #if already installed
con <- dbConnect(RMySQL::MySQL() ,host = "127.0.0.1",dbname="be_fit",user = "root", password = "" )
setwd("/Applications/XAMPP/xamppfiles/htdocs/Client_project")
items<-read.csv("list.csv",sep = ",")
itemsdf<- data.frame(items)

dbListTables(con)
name<-"items"
dbWriteTable(con, name, itemsdf)




