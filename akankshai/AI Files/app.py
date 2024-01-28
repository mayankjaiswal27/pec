import pandas as pd
import tensorflow as tf
from sklearn.preprocessing import LabelEncoder
from flask import Flask, render_template_string
from flask import Flask, request
import mysql.connector

# Database connection parameters
hostname = "127.0.0.1"
username = "root"
password = ""
dbname = "akankshai"

# Establish a database connection
conn = mysql.connector.connect(host=hostname, user=username, password=password, database=dbname)

# Check if the connection is successful
if conn.is_connected():
    print("Connected to the database")

    # Create a cursor object to execute SQL queries
    cursor = conn.cursor()

    # SQL query to select data from the user_responses table
    sql_query = "SELECT response AS ocean_array FROM user_responses WHERE id BETWEEN 35 AND 84"

    


    try:
        # Execute the SQL query
        cursor.execute(sql_query)

        # Fetch all rows of the result
        result = cursor.fetchall()

        # Process the fetched data
        # Process the fetched data
        oceanArray = [float(row[0]) for row in result]

        # Calculate the values for O, E, A, N, C
        e = (20 + oceanArray[0] - oceanArray[5] + oceanArray[10] - oceanArray[15] +
             oceanArray[20] - oceanArray[25] + oceanArray[30] - oceanArray[35] +
             oceanArray[40] - oceanArray[45]) / 0.4
        a = (14 - oceanArray[1] + oceanArray[6] - oceanArray[11] + oceanArray[16] -
             oceanArray[21] + oceanArray[26] - oceanArray[31] + oceanArray[36] +
             oceanArray[41] - oceanArray[46]) / 0.4
        c = (14 + oceanArray[2] - oceanArray[7] + oceanArray[12] - oceanArray[17] +
             oceanArray[22] - oceanArray[27] + oceanArray[32] - oceanArray[37] +
             oceanArray[42] - oceanArray[47]) / 0.4
        n = (38 - oceanArray[3] + oceanArray[8] - oceanArray[13] + oceanArray[18] -
             oceanArray[23] + oceanArray[28] - oceanArray[33] + oceanArray[38] +
             oceanArray[43] - oceanArray[48]) / 0.4
        o = (8 + oceanArray[4] - oceanArray[9] + oceanArray[14] - oceanArray[19] +
             oceanArray[24] - oceanArray[29] + oceanArray[34] - oceanArray[39] +
             oceanArray[44] - oceanArray[49]) / 0.4

        # Print or use the calculated values
        print("E:", e)
        print("A:", a)
        print("C:", c)
        print("N:", n)
        print("O:", o)

    except Exception as e:
        print("Error executing the query:", e)

    sql_query_generic = "SELECT response AS generic_array FROM user_responses WHERE id BETWEEN 1 AND 20"

    try:
        # Execute the SQL query for generic_array
        cursor.execute(sql_query_generic)

        # Fetch all rows of the result
        result_generic = cursor.fetchall()

        # Process the fetched data for generic_array
        genericArray = [float(row[0]) for row in result_generic]
        print(genericArray)

    except Exception as e:
        print("Error executing the query for generic_array:", e)
    
    sql_query_engi = "SELECT response AS generic_array FROM user_responses WHERE id BETWEEN 20 AND 33"

    try:
        # Execute the SQL query for generic_array
        cursor.execute(sql_query_engi)

        # Fetch all rows of the result
        result_engi = cursor.fetchall()

        # Process the fetched data for generic_array
        engiArray = [float(row[0]) for row in result_engi]
        print(engiArray)

    except Exception as e:
        print("Error executing the query for generic_array:", e)


else:
    print("Failed to connect to the database")

app = Flask(__name__)

# Load the trained models
model_generic = tf.keras.models.load_model("akankshai/AI Files/model_generic.h5")
model_parallel_1 = tf.keras.models.load_model("akankshai/AI Files/model_parallel_1.h5")
model_parallel_2 = tf.keras.models.load_model("akankshai/AI Files/model_parallel_2.h5")
model_combined = tf.keras.models.load_model("akankshai/AI Files/model_combined.h5")

# Example input data (replace with your actual input data)
input_data_generic = genericArray
input_data_parallel_1 = engiArray
input_data_parallel_2 = [o,c,e,a,n]



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
        return render_template_string(open("akankshai/AI Files/index2.html").read(), 
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
