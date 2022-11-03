package Calculator1;

public class SpecialCalculator extends BasicCalculator {
  
  //Declaration of variable.
  private double r = 0;

  //Converts a temperature from Celsius to Fahrenheit.
  public void toFahrenheit(Double celsius) {
    r = 1.8 * celsius + 32;
    setResult(r);
  }
  
  //Takes 2 numbers and returns their mean value.
  public void averageOfNumbers(double num1, double num2) {
    r = (num1 + num2) / 2;
    setResult(r);
  }
}
