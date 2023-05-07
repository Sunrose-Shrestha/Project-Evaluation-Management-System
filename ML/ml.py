import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import pickle

dataset = pd.read_csv('college.csv')
c=["Review 1","Review 2"]
x = dataset[c].values
y = dataset['Final Index'].values

from sklearn.tree import DecisionTreeRegressor 
  
# create a regressor object
regressor = DecisionTreeRegressor(random_state = 0) 
  
# fit the regressor with X and Y data
pickle.dump(regressor.fit(x, y),open('college.pkl','wb'))
