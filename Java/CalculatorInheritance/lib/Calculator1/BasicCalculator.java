
package Calculator1;

public class BasicCalculator extends Calculator {
  
  //Declaration of variables
  private String operator = "";
  private double result = 0;

  //Create object.
  Calculator MediatorObject = new Calculator();

  //Check which operator is used and choose the correct calculation.
  protected double checkOperator() {
    if (operator.equals("+")) {
      result = getAddition();
    } else if (operator.equals("-")) {
      result = getSubtraction();
    } else if (operator.equals("*")) {
      result = getMultiplication();
    } else if (operator.equals("/")) {
      result = getDivision();
    } else if (operator.equals("%")) {
      result = getRemainder();
    }
    return result;
  }

  //Setter
  protected void setOperator(String oper) {
    this.operator = oper;
  }

  //Getters
  protected double getAddition() {
    double sum = 0;
    sum = MediatorObject.getNumber1() + MediatorObject.getNumber2();
    return sum;
  }

  protected double getSubtraction() {
    double sum = 0;
    sum = MediatorObject.getNumber1() - MediatorObject.getNumber2();
    return sum;
  }

  protected double getMultiplication() {
    double sum = 0;
    sum = MediatorObject.getNumber1() * MediatorObject.getNumber2();
    return sum;
  }

  protected double getDivision() {
    double sum = 0;
    sum = MediatorObject.getNumber1() / MediatorObject.getNumber2();
    return sum;
  }

  protected double getRemainder() {
    double sum = 0;
    sum = MediatorObject.getNumber1() % MediatorObject.getNumber2();
    return sum;
  }
}