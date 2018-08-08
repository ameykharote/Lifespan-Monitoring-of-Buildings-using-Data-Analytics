rm(FinalData)

View(FinalData)

library(ggplot2)

ggplot(FinalData, aes(x=Total_number_of_maint, fill= factor(Age)))+
  geom_histogram()+
  xlab("Total Number Of Maintenance")+
  ylab("Number of Buildings")

str(FinalData)

head(Train_Pred)
head(Test_Pred)
str(Train_Pred)
str(Test_Pred)

attach(Train_Pred)

results <- lm(Lifespan~Type_of_Const+Type_of_Foundation+Total_number_of_maint, Train_Pred)
summary(results)

results <- lm(Lifespan~Type_of_Foundation+Total_number_of_maint, Train_Pred)
summary(results)

results <- lm(Lifespan~Type_of_Foundation, Train_Pred)
summary(results)

results$coefficients

coef(results)

Finalprediction <- predict(results,Test_Pred)

head(Finalprediction)

FinalPredictedTest <- data.frame(Finalprediction)

Finalprediction1 <- predict(results, Train_Pred)
head(Finalprediction1)

FinalPredictedTrain <- data.frame(Finalprediction1)

write.csv(FinalPredictedTest, "FinalPredictedTest.csv")
write.csv(FinalPredictedTrain, "FinalPredictedTrain.csv")
write.csv(PredictedTest, "PredictedTest.csv")
write.csv(PredictedTrain, "PredictedTrain.csv")
