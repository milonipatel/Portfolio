Policy Evaluation System - Written in C# and developed using Visual Studio 2019 IDE (Version 8.0.8)
../../Files/input.txt ../../Files/PolicyStore.json ../../Files/output.txt
CONTENTS: 

Program.cs: Main class file.

PolicyItem.cs: A class having all the parameters of the policy.

ReadFile.cs: Reads the input file in the form:
			Name = Miloni
			WorksFor = USC
			NeedsAccessTo = Router
			RequestedTime = 5
	And puts the values in a dictionary with KEY as parameter (eg Name,WorksFor,etc) and VALUE as (eg Miloni,USC,etc).

PolicyCheck.cs : Takes the input dictionary(obtained after the read function), parses the json and checks if the policy matches the input and determines the policy and action.
Note: Used Newtonsoft.Json package to generate a list of PolicyItem objects from the json file.

WriteFile.cs: Writes the output to an output file.

Files :
	input.txt - Input 
	PolicyStore.json - Stores the Policy JSON
	output.txt - Output

Dependencies: Newtonsoft.Json.dll	

****INSTRUCTIONS TO RUN THE SOLUTION*******

Using Visual Studio IDE
Run with a custom configuration.

Arguments:
 
args[0] - path_to_input (eg: ../../Files/input.txt) 
args[1] - path_to_json (eg: ../../Files/PolicyStore.json)
args[2] - path_to_output (eg: ../../Files/output.txt)

Without Visual Studio IDE:

Details for running the C# code without Visual Studio can be found here : https://kozmicluis.com/compile-c-sharp-command-line/


            

