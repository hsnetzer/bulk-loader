# bulk-loader
Find NN for several points and write to file

> php index.php path_to_database.db path_to_input.csv path_to_output.csv

Input needs to be a csv with athlete's name, time, lat, and lon in the first four columns. Script will make a new csv with distance and cumulative elevation added as 5th and 6th column. Both are measured in meters and are in the nobo direction.
