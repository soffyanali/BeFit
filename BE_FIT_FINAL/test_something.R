setwd("C:/xampp/htdocs/BE_FIT_FINAL")
source('apropri.R')

context("Just testing grocery names and transactions")

testing_data <- data.frame('letters'=c('a', 'b', 'c', 'd'),
                           'numbers'=seq(1, 4))
print(testing_data)

install.packages('testthat')
library(testthat)

test_that("Grocery checklist", {
  
  expect_equivalent(mean(groceryrules_df$support[groceryrules_df$confidence == '1']), groceryrules_df$rhs['(beef)'])
  
  ## Test Passed:
  expect_output(str(groceryrules_df$count)$numbers, "21")
})




#Testing for no_missing value
test_that('no missing values', {
  expect_identical(groceryrules_df, na.omit(groceryrules_df))
})
