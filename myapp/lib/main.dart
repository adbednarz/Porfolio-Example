import 'package:flutter/material.dart';
import 'package:katex_flutter/katex_flutter.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        body: MyCustomForm(),
      ),
    );
  }
}

class MyCustomForm extends StatefulWidget {
  @override
  MyCustomFormState createState() {
    return MyCustomFormState();
  }
}

class MyCustomFormState extends State<MyCustomForm> {

  String userInput = "Tutaj ukaże się rezultat";

  final myController = TextEditingController();

  setUserInput() {
    setState(() {
      userInput = myController.text;
    });
  }

  Widget input() {
    return TextField(
        controller: myController,
        keyboardType: TextInputType.multiline,
        maxLines: null,
        decoration: InputDecoration(
          border: OutlineInputBorder(),
          hintText: 'Wprowadź wzór matematyczny',
        ),
      );
  }

  Widget btn() {
    return ElevatedButton(
      child: Text('Konwertuj'),
      onPressed: () => setUserInput(),
    );
  }

  BoxDecoration decoration() {
    return BoxDecoration(
      border: Border.all(
        color: Colors.grey,
      ),
      borderRadius: BorderRadius.circular(5.0),
    );
  }

  Widget output() {
    return KaTeX(
      laTeXCode: Text(userInput),         
      delimiter: r'$',            
      displayDelimiter: r'$$',
    );
  }

  @override
  Widget build(BuildContext context) {
    if (MediaQuery.of(context).size.width < 1000) {
      return Column(
        children: [
          Container(
            margin: EdgeInsets.symmetric(horizontal: MediaQuery.of(context).size.width/5, vertical: 16),
            child: input(),
          ),
          Container(
            margin: EdgeInsets.symmetric(horizontal: 8, vertical: 16),
            child: btn(),    
          ),
          Container(
            padding: EdgeInsets.symmetric(horizontal: 8, vertical: 16),
            margin: EdgeInsets.symmetric(horizontal: MediaQuery.of(context).size.width/5, vertical: 16), 
            width: MediaQuery.of(context).size.width*0.8,
            decoration: decoration(),
            child: output(),
          ),
        ],
      );
    } else {
      return Row(
        mainAxisAlignment: MainAxisAlignment.spaceEvenly,
        children: [
          Container(
            width: MediaQuery.of(context).size.width/3,
            margin: EdgeInsets.symmetric(vertical: 8),
            child: input(),               
          ),  
          Container(
            child: btn(),               
          ),
          Container(
            padding: EdgeInsets.symmetric(horizontal: 8, vertical: 16),
            width: MediaQuery.of(context).size.width/3,  
            margin: EdgeInsets.symmetric(vertical: 8),
            decoration: decoration(),
            child: output(),               
          ),
        ],
      );      
    }
  }
}