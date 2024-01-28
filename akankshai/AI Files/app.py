# import pandas as pd
# import tensorflow as tf
# from sklearn.preprocessing import LabelEncoder
# from flask import Flask, render_template_string

# # Load the input data for prediction
# input_data_generic = [2, 3, 3, 0, 2, 0, 2, 1, 2, 0, 1, 2, 0, 0, 2, 0, 0, 2, 1, 0]
# input_data_parallel_1 = [0, 0.66, 0, 0, 0, 0, 0.25, 0, 0, 0.5, 0, 0.25, 0, 0]
# input_data_parallel_2 = [0.706181, 0.604714, 0.528406, 0.557752, 0.315469]

# # Load the trained models
# model_generic = tf.keras.models.load_model("model_generic.h5")
# model_parallel_1 = tf.keras.models.load_model("model_parallel_1.h5")
# model_parallel_2 = tf.keras.models.load_model("model_parallel_2.h5")
# model_combined = tf.keras.models.load_model("model_combined.h5")

# # Convert lists to numpy arrays for compatibility with TensorFlow
# X_input_generic = tf.constant([input_data_generic], dtype=tf.float32)
# X_input_parallel_1 = tf.constant([input_data_parallel_1], dtype=tf.float32)
# X_input_parallel_2 = tf.constant([input_data_parallel_2], dtype=tf.float32)

# # Make predictions using individual models
# predictions_generic = model_generic.predict(X_input_generic)
# predictions_parallel_1 = model_parallel_1.predict(X_input_parallel_1)
# predictions_parallel_2 = model_parallel_2.predict(X_input_parallel_2)

# # Combine the outputs of parallel AI 1 and AI 2 for the third AI
# combined_input = tf.keras.layers.Concatenate()([predictions_parallel_1, predictions_parallel_2])

# # Make predictions using the combined model
# predictions_combined = model_combined.predict(combined_input)

# your_original_labels_for_generic = ['Engineering']
# your_original_labels_for_parallel_1 = ['Computer Science and Engineering (including specializations) / Information Technology', 'Electronics and Communication Engineering', 'Mechanical Engineering']
# your_original_labels_for_parallel_2 = [ 'Computer Science and Engineering (including specializations) / Information Technology', 'Electronics and Communication Engineering', 'Mechanical Engineering', 'Civil Engineering']
# your_original_labels_for_combined = [ 'Computer Science and Engineering (including specializations) / Information Technology', 'Electronics and Communication Engineering', 'Mechanical Engineering', 'Civil Engineering', '1']

# # Create and fit LabelEncoders for each model's predictions
# label_decoder_generic = LabelEncoder()
# label_decoder_generic.fit(your_original_labels_for_generic)  # Replace with your actual labels
# label_decoder_parallel_1 = LabelEncoder()
# label_decoder_parallel_1.fit(your_original_labels_for_parallel_1)  # Replace with your actual labels
# label_decoder_parallel_2 = LabelEncoder()
# label_decoder_parallel_2.fit(your_original_labels_for_parallel_2)  # Replace with your actual labels
# label_decoder_combined = LabelEncoder()
# label_decoder_combined.fit(your_original_labels_for_combined)  # Replace with your actual labels

# # Inverse transform the predictions to get the original labels
# predicted_labels_generic = label_decoder_generic.inverse_transform(tf.argmax(predictions_generic, axis=1).numpy())
# predicted_labels_parallel_1 = label_decoder_parallel_1.inverse_transform(tf.argmax(predictions_parallel_1, axis=1).numpy())
# predicted_labels_parallel_2 = label_decoder_parallel_2.inverse_transform(tf.argmax(predictions_parallel_2, axis=1).numpy())
# predicted_labels_combined = label_decoder_combined.inverse_transform(tf.argmax(predictions_combined, axis=1).numpy())

# # Print or use the predicted labels as needed
# print("Predicted Labels - Generic AI:", predicted_labels_generic[0])
# print("Predicted Labels - Parallel AI 1:", predicted_labels_parallel_1[0])
# print("Predicted Labels - Parallel AI 2:", predicted_labels_parallel_2[0])
# print("Predicted Labels - Combined AI:", predicted_labels_combined[0])

# # Flask app
# app = Flask(__name__)

# # Define the route to render the HTML template
# @app.route('/')
# def index():
#     try:
#         # Pass the predicted labels to the HTML template
#         return render_template_string(open("index.html").read(), 
#                                       predicted_labels_generic=predicted_labels_generic[0],
#                                       predicted_labels_parallel_1=predicted_labels_parallel_1[0],
#                                       predicted_labels_parallel_2=predicted_labels_parallel_2[0],
#                                       predicted_labels_combined=predicted_labels_combined[0])
#     except Exception as e:
#         return f"Error: {str(e)}"

# # Run the Flask app
# if __name__ == '__main__':
#     app.run(debug=True)


import pandas as pd
import tensorflow as tf
from sklearn.preprocessing import LabelEncoder
from flask import Flask, render_template_string

# Load the trained models
model_generic = tf.keras.models.load_model("model_generic.h5")
model_parallel_1 = tf.keras.models.load_model("model_parallel_1.h5")
model_parallel_2 = tf.keras.models.load_model("model_parallel_2.h5")
model_combined = tf.keras.models.load_model("model_combined.h5")

# Example input data (replace with your actual input data)
input_data_generic = [2, 3, 3, 0, 2, 0, 2, 1, 2, 0, 1, 2, 0, 0, 2, 0, 0, 2, 1, 0]
input_data_parallel_1 = [0, 0.66, 0, 0, 0, 0, 0.25, 0, 0, 0.5, 0, 0.25, 0, 0]
input_data_parallel_2 = [0.706181, 0.604714, 0.528406, 0.557752, 0.315469]

# Convert lists to numpy arrays for compatibility with TensorFlow
X_input_generic = tf.constant([input_data_generic], dtype=tf.float32)
X_input_parallel_1 = tf.constant([input_data_parallel_1], dtype=tf.float32)
X_input_parallel_2 = tf.constant([input_data_parallel_2], dtype=tf.float32)

# Make predictions using individual models
predictions_generic = model_generic.predict(X_input_generic)
predictions_parallel_1 = model_parallel_1.predict(X_input_parallel_1)
predictions_parallel_2 = model_parallel_2.predict(X_input_parallel_2)

# Combine the outputs of parallel AI 1 and AI 2 for the third AI
combined_input = tf.keras.layers.Concatenate()([predictions_parallel_1, predictions_parallel_2])

# Make predictions using the combined model
predictions_combined = model_combined.predict(combined_input)

# Define original labels for decoding
your_original_labels_for_generic = ['Engineering']
your_original_labels_for_parallel_1 = ['Computer Science and Engineering', 'Electronics and Communication Engineering', 'Mechanical Engineering']
your_original_labels_for_parallel_2 = ['Computer Science and Engineering', 'Electronics and Communication Engineering', 'Mechanical Engineering', 'Civil Engineering']
your_original_labels_for_combined = ['Computer Science and Engineering', 'Electronics and Communication Engineering', 'Mechanical Engineering', 'Civil Engineering', '1']

# Create and fit LabelEncoders for each model's predictions
label_decoder_generic = LabelEncoder()
label_decoder_generic.fit(your_original_labels_for_generic)  # Replace with your actual labels
label_decoder_parallel_1 = LabelEncoder()
label_decoder_parallel_1.fit(your_original_labels_for_parallel_1)  # Replace with your actual labels
label_decoder_parallel_2 = LabelEncoder()
label_decoder_parallel_2.fit(your_original_labels_for_parallel_2)  # Replace with your actual labels
label_decoder_combined = LabelEncoder()
label_decoder_combined.fit(your_original_labels_for_combined)  # Replace with your actual labels

# Inverse transform the predictions to get the original labels
predicted_labels_generic = label_decoder_generic.inverse_transform(tf.argmax(predictions_generic, axis=1).numpy())
predicted_labels_parallel_1 = label_decoder_parallel_1.inverse_transform(tf.argmax(predictions_parallel_1, axis=1).numpy())
predicted_labels_parallel_2 = label_decoder_parallel_2.inverse_transform(tf.argmax(predictions_parallel_2, axis=1).numpy())
predicted_labels_combined = label_decoder_combined.inverse_transform(tf.argmax(predictions_combined, axis=1).numpy())

# Flask app
app = Flask(__name__)

# Example dataset, replace this with your actual data
college_exam_data = {
    'Computer Science and Engineering': {
        'colleges': ['IIT Madras', 'IIT Delhi', 'IIT Bombay', 'IIT Kharagpur', 'Bits Pilani'],
        'exams': ['JEE Mains', 'JEE Advance', 'BITSAT'],
        'resources': ['Geeks for Geeks: https://www.geeksforgeeks.org/', 'CodeChef: https://www.codechef.com/', 'Coursera: https://www.coursera.org/en-IN']
    },
    'Electronics and Communication Engineering': {
        'colleges': ['IIT Madras', 'IIT Delhi', 'IIT Bombay', 'Bits Pilani', 'NIT Trichy'],
        'exams': ['JEE Mains', 'JEE Advance', 'BITSAT'],
        'resources': ['Geeks for Geeks: https://www.geeksforgeeks.org/', 'CodeChef: https://www.codechef.com/', 'Coursera: https://www.coursera.org/en-IN']
    },
    'Mechanical Engineering': {
        'colleges': ['IIT Madras', 'IIT Delhi', 'IIT Roorky', 'IIT Guwahati', 'BITS Hyderabad'],
        'exams': ['JEE Mains', 'JEE Advance', 'BITSAT'],
        'resources': ['Geeks for Geeks: https://www.geeksforgeeks.org/', 'CodeChef: https://www.codechef.com/', 'Coursera: https://www.coursera.org/en-IN']
    },
    'Civil Engineering': {
        'colleges': ['IIT Madras', 'IIT Delhi', 'IIT Bombay', 'IIT Kanpur', 'IIT BHU'],
        'exams': ['JEE Mains', 'JEE Advance', 'BITSAT'],
        'resources': ['Geeks for Geeks: https://www.geeksforgeeks.org/', 'CodeChef: https://www.codechef.com/', 'Coursera: https://www.coursera.org/en-IN']
    }
}

# Define the route to render the HTML template
@app.route('/')
def index():
    try:
        # Convert numpy arrays to strings
        predicted_labels_generic_str = str(predicted_labels_generic[0])
        predicted_labels_parallel_1_str = str(predicted_labels_parallel_1[0])
        predicted_labels_parallel_2_str = str(predicted_labels_parallel_2[0])
        predicted_labels_combined_str = str(predicted_labels_combined[0])

        # Pass the predicted labels and related information to the HTML template
        return render_template_string(open("index.html").read(), 
                                      predicted_labels_generic=predicted_labels_generic_str,
                                      predicted_labels_parallel_1=predicted_labels_parallel_1_str,
                                      predicted_labels_parallel_2=predicted_labels_parallel_2_str,
                                      predicted_labels_combined=predicted_labels_combined_str,
                                      college_exam_data=college_exam_data)
    except Exception as e:
        return f"Error: {str(e)}"

# Run the Flask app
if __name__ == '__main__':
    app.run(debug=True)

