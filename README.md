# project title with problem statement
OPTIMUS

Problem- How to reduce push notifications and personalise it for maximum click through rate ?

# Description
Major of businesses today thrive on the performance of their App or Mobile Application. In this industry, targeted advertising and its click through rate play a vital role. Push Notifications need to become “Smart” in order to help improve customer retention. 

# Installation inbuilt process
The ML model populates the data with required information ( next notification to be sent and the content). A daemon process running will trigger the notification for the particular user at the scheduled time. The notification status is captured (swiped, opened , timestamp) and used as feedback for our iterative ML model to improvise the persoanilzed notification of the user.


# Execution details
Use implemented machine learning model that takes the user as the input and makes optimal predictions.
Send the prediction model to MySQL Database of the backend server that communicates with the database.
Communicate with the mobile device using backend logic and our predictions and make optimal decisions on when to send the push notifications.

# Other Resources 
dependancies API

# Information 
The model encorporates 3 facets for inference :
1. General Inference where we try to infer the general trend in the sample popualation. It does so by generating a correlation matrix for each item with every other item. The correlation matrix is dynamic in naturer and the environmental factors can be encorporated into it
2. Personalized prediction where based on measuring the user activiy (such as when a notification is clicked and the device statistics at that instance) we try to predict the click sequence of the user and thus optimize the click rate of the notification.
3. Segmented prediction where we subdivide the clients into user segments based on demographic/ or measurable factors. Here we used RFM analysis for customer segmentation. We then try to optimize the types of notifications for each segment based on statistical approach.

Our model thus encorporates these three facets and tries to make prediction on the notification type and the items that are relevant to a particular user along with a time frame of when they should be sent.s


# better_notifs

Recommended_frequency.csv file contains the different types segmentation users can belong to.

User Categorisation Jupyter Notebook contains categorisation of users.

Segment_Mapping.csv is the output where each of the types of users is mapped to a notification type.

Recommendation_engine is our recommendation engine for recommending top 10 products to the user, which type of notification to be sent,
and when should it be sent.

rfm.ipynb notebook contains the implementation of the analytical model used to customer segmentation, and rfm.csv is the output.

Also note that due to file size restriction issues, the datasets could not be uploaded to the repo.
