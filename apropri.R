library(dplyr)
library(reshape2)
library(Matrix)
library(stringr)
#install.packages('stringdist')
library(stringdist)
#install.packages('arulesViz')
library(arulesViz)
#install.packages('arules')
library(arules)
setwd("C:/xampp/htdocs/BE_FIT_FINAL")
groceries<-read.transactions("items_1.csv",sep = ",")
summary(groceries)

#install.packages('RMySQL')
require(RMySQL) #if already installed
con <- dbConnect(RMySQL::MySQL() ,host = "127.0.0.1",dbname="be_fit",user = "root", password = "" )
setwd("C:/xampp/htdocs/BE_FIT_FINAL")
items<-read.csv("list.csv",sep = ",")
itemsdf<- data.frame(items)

dbListTables(con)
#name<-"items"
#dbWriteTable(con, name, itemsdf)

inspect(groceries[1:5])

itemFrequency(groceries[, 1:3])
itemFrequencyPlot(groceries, support = 0.1)              
itemFrequencyPlot(groceries, topN = 20)              
image(groceries[1:5])

#Parameter Specification
#If support is 0.06 then it outcome less rule only 11 and if its increased to 0.0006 then output is 9354 rules
#Below we are limiting the size and number of rules generated.
#You set these parameters to adjust the number of rules you will get. 
#If you want stronger rules, you can increase the value of conf and for 
#more extended rules give higher value to maxlen.

groceryrules <- apriori(groceries, parameter = list(support = 0.006,
                                                    confidence = 0.25, minlen = 2))

#yogurtrules <- apriori(groceries, parameter = list(supp=0.001, conf=0.8),appearance = list(default="lhs",rhs="yogurt"))
#inspect(head(yogurtrules))

groceryrules

summary(groceryrules)
inspect(groceryrules[1:3])
inspect(sort(groceryrules, by = "lift")[1:5])

beefrules <- subset(groceryrules, items %in% "beef")
inspect(beefrules)
#write(groceryrules, file = "groceryrules.csv", sep = ",", quote = TRUE, row.names = FALSE)

groceryrules_df <- as(groceryrules, "data.frame")

str(groceryrules_df)



plot(beefrules, method="graph", control=list(type="items"), shading = "lift")



rules = sapply(groceryrules_df$rules,function(x){
  x = gsub("[\\{\\}]", "", regmatches(x, gregexpr("\\{.*\\}", x))[[1]])
  x = gsub("=>",",",x)
  x = str_replace_all(x," ","")
  return( x )
})

rules = as.character(rules)
rules = str_split(rules,",")

groceryrules_df$lhs = sapply( rules, "[[", 1)
groceryrules_df$rhs = sapply( rules , "[[", 2)

groceryrules_df$rules = NULL
rm(rules)
gc()





#groceryrules_df = groceryrules_df %>% left_join(groceries,by=c("lhs"="lhs") )
groceryrules_df %>% arrange(desc(lift)) %>% select(lhs,rhs,support,confidence,lift) %>% head()

#################selected item from UI by user
dbListFields(con, 'Selected_items')

rs = dbSendQuery(con, "select * from Selected_items ORDER BY ID DESC LIMIT 1")
data = fetch(rs, n=-1)
data
userid <- data$user_ID
item<-data$Item_Name
recom_table<-groceryrules_df %>% 
  filter(str_detect(lhs, item) ) %>%
    select(lhs,rhs,support,confidence,lift) %>%
  head(20)

# recom_table  <- data.frame(recom_table)
# userid<-'NULL'
recom_table<-cbind(recom_table,userid)
recom_table

 #if already installed
#con <- dbConnect(RMySQL::MySQL(), host = "localhost",dbname="fit",user = "root", password = "")

#dbListTables(con)
name<-"recommendation"
#dbWriteTable(con, name, recom_table)

dbWriteTable(con, name, recom_table, append=TRUE, row.names=FALSE)



#SELECT DISTINCT(items.item_name),items.Energ_Kcal,items.Carbohydrt,items.Protein FROM `items` inner join `user_selection` ON items.item_name=user_selection.rhs


#SELECT DISTINCT(items.item_name),items.Energ_Kcal,items.Carbohydrt,items.Protein FROM `items` inner join `recommendation` ON items.item_name=recommendation.rhs

