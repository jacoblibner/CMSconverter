# CMSconverter

This script creates static HTML webpages. It takes the content from .txt files in indicated folder, compares them between each other and creates .html files with inserted appripriate for each file relative links to relevant pages (each other from amongst the converted files), links to directory (subfolder of each file in it's source folder) and schema.org tags (depending on the keywords found in the source file's directory path).

It spent 200 minutes on 2600 files totally 16 MB heavy. 

There is room for improvement, mainly in shrinking the area of comparison for each file from all the files to only files with similar unique words within them.

Further development is possible but not yet scheduled.
