from flask import Flask, jsonify, request, render_template
import pickle
import numpy as np

app = Flask(__name__)

# Load the model
model = pickle.load(open('college.pkl','rb'))

# Define the home page
@app.route('/')
def home():
    return render_template('index.html')

# Define the prediction function
@app.route('/predict',methods=['POST'])
def predict():
    # Get the input data from the form
    review1 = request.form['review1']
    review2 = request.form['review2']
    
    # Convert the input data to a numpy array
    input_data = np.array([[review1, review2]])

    # Make a prediction using the loaded model
    prediction = model.predict(input_data)

    # Return the prediction as a JSON response
    return jsonify({'prediction': str(prediction[0])})

if __name__ == '__main__':
    # Run the Flask app
    app.run(debug=True)
