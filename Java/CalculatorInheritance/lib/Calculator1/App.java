package Calculator1;
import java.util.Scanner;

public class App {
    public static void main(String[] args) throws Exception {
        
        //Create user input class.
        Scanner sc = new Scanner(System.in);

        //Declaration of variable.
        String basicOrSpecial = "";

        //Program starts.
        System.out.println("Do you want to use basic or special calculator \n(write basic or special)?");
        basicOrSpecial = sc.next();

        //Keep program running until not basic or special.
        while (basicOrSpecial.equals("basic") || basicOrSpecial.equals("special")) {

            //**(Way 1) Two objects use same variables.
            if (basicOrSpecial.equals("basic")) {
                
                //Create an object from calculator
                BasicCalculator basicCalc = new BasicCalculator();
                
                //While TRUE ask calculations
                while (basicCalc.getCalculator()) {
                    try {

                        //Enter the user input parameters and send those to methods.
                        System.out.println("Enter the first number:");
                        Double number1String = Double.valueOf(sc.next());
                        basicCalc.setNumber1(number1String);
                        System.out.println("Enter the operator (+, -, *, / or %.):");
                        basicCalc.setOperator(sc.next());
                        System.out.println("Enter another number:");
                        Double number2String = Double.valueOf(sc.next());
                        basicCalc.setNumber2(number2String);
                        System.out.println("Result is " + basicCalc.checkOperator());
    
                        //Check if user wants calculate more.
                        System.out.println("Do you want to add a new calculation (y/n)?");
                        basicCalc.setCalculator(sc.next());

                        //Stops calculator.
                        if (!basicCalc.getCalculator()) {
                            basicOrSpecial = "";
                            sc.close();
                        }
                        
                    } catch (Exception e) {
                        System.out.println("Incorrect user input.");
                    }
                }

            //**(Way 2) One object in use.
            } else if (basicOrSpecial.equals("special")) {

                //Create an object from calculator
                SpecialCalculator specCalc = new SpecialCalculator();
                
                //Declaration of variable
                String oneOrTwo = "";
                
                while (true) {
                    try {

                        //Check which operation will be used.
                        System.out.println("1) Covert Celsius to Fahrenheit 2) Average of 2 numbers.");
                        oneOrTwo = "";
                        oneOrTwo = sc.next();

                        //Enter the user input parameters and send those to methods.
                        if (oneOrTwo.equals("1")) {
                            System.out.println("Enter °C:");
                            specCalc.setNumber1(sc.nextDouble());
                            specCalc.toFahrenheit(specCalc.getNumber1());
                            System.out.println(specCalc.getNumber1() + "°C = " + specCalc.getResult() + "°F");
                        } else if (oneOrTwo.equals("2")) {
                            System.out.println("Enter the first number:");
                            Double number1String = Double.valueOf(sc.next());
                            specCalc.setNumber1(number1String);
                            System.out.println("Enter the second number:");
                            Double number2String = Double.valueOf(sc.next());
                            specCalc.setNumber2(number2String);
                            specCalc.averageOfNumbers(specCalc.getNumber1(), specCalc.getNumber2());
                            System.out.println("Average of number " + specCalc.getNumber1() + " and number " + specCalc.getNumber2() + " is " + specCalc.getResult());
                        } else {
                            System.out.println("Wrong user input.");
                            break;
                        }

                        //Check if user wants calculate more.
                        System.out.println("Do you want to add a new calculation (y/n)?");
                        basicOrSpecial = "";
                        basicOrSpecial = sc.next();

                        //Stop calculator
                        if (basicOrSpecial.equals("n")) {
                            sc.close();
                            break;
                        }
                        specCalc.setCalculator(basicOrSpecial); 

                    } catch (Exception e) {
                        System.out.println("Incorrect user input.");
                        basicOrSpecial = "";
                    }
                }
            } 
        }        
    }
}