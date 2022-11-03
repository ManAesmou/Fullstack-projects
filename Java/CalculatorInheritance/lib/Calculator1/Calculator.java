package Calculator1;

public class Calculator {
  
  //Declaration of variables
  private static double number1 = 0, number2 = 0, result = 0;
  private String onOff = "";
  private boolean calculate = true;

  //Set the calculator on or off.
  protected void setCalculator(String onOff) {
    this.onOff = onOff;
  }

  //Get calculator status.
  protected boolean getCalculator() {
    if (onOff.equals("y")) {
      calculate = true;
    } else if (onOff.equals("n")) {
      calculate = false;
    }
    return calculate;
  }

  //Setters
  protected void setNumber1(double num1) {
    number1 = num1;
  }

  protected void setNumber2(double num2) {
    number2 = num2;
  }

  protected void setResult(double sum) {
    result = sum;
  }

  //Getters
  protected double getNumber1() {
    return number1;
  } 

  protected double getNumber2() {
    return number2;
  }
  
  protected double getResult() {
    return result;
  }
}