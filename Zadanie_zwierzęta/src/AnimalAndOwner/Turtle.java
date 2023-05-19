package AnimalAndOwner;

import java.util.Scanner;

public class Turtle extends Animal {

    private TurtleType turtleType;

    public Turtle() {
    }


    public Turtle(String name, Gender plec, int age, Owner owner, TurtleType turtleType) {

        super(name, plec, age, owner);
        this.turtleType = turtleType;
    }


    public void turtleInfo() {
        System.out.println("*****");
        System.out.println("Typ zwierzaka to zolw");
        System.out.println("Typ zolwia to: " + this.turtleType);
        System.out.println("Imie zolwia to: " + this.getName());
        System.out.println("Plec zolwia to: " + this.getGender());
        System.out.println("Wiek zolwia to: " + this.getAge());
    }

    public TurtleType getTurtleType() {
        return turtleType;
    }
}
