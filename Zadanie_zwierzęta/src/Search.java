import AnimalAndOwner.*;

import java.util.List;
import java.util.Scanner;

public class Search {
    private List<Owner> owners = Menu.getOwners();
    Scanner scanner = new Scanner(System.in);

    public void searchByName() {
        System.out.println("Zwierzaka o jakim imieniu chcesz wyszukac?");
        String name = scanner.next();
        int number = 0;
        for (Owner owner : owners) {

            for (CatDog catDog : owner.getCatsDogs()) {
                if (catDog != null) {
                    if (name.equals(catDog.getName())) {
                        catDog.CatDogInfo();
                        number++;
                    }
                }
            }
            for (Turtle turtle : owner.getTurtles()) {
                if (turtle != null) {
                    if (name.equals(turtle.getName())) {
                        turtle.turtleInfo();
                        number++;
                    }
                }
            }
        }
        if (number == 0) {
            System.out.println("Nie ma zwierzaka o takim imieniu");
        }

    }

    public void searchByAge() {
        int age = 0;
        do {
            System.out.println("Zwierzaki o minimum jakim wieku chcialbys wypisac?");
            Scanner scage = new Scanner(System.in);

            if (scage.hasNextInt()) {
                age = scage.nextInt();
            } else {
                System.out.println("Wiek podajemy w liczbach dodatnich");
            }
        } while (age < 0);
        int number = 0;
        for (Owner owner : owners) {
            for (CatDog catDog : owner.getCatsDogs()) {
                if (catDog != null) {
                    if (catDog.getAge() >= age) {
                        catDog.CatDogInfo();
                        number++;
                    }
                }
            }
            for (Turtle turtle : owner.getTurtles()) {
                if (turtle != null) {
                    if (turtle.getAge() >= age) {
                        turtle.turtleInfo();
                        number++;
                    }
                }
            }
        }
        if (number == 0) {
            System.out.println("Nie ma zwierzakow spelniajacych warunki wyszukiwania.");
        }

    }

    public void searchByOwner() {
        System.out.println("Jakie nazwisko ma miec wlasciciel,ktorego(ktorych) zwierzaki chcesz wypisac");
        String surename = scanner.next();
        int number = 0;
        for (Owner owner : owners) {

            for (CatDog catDog : owner.getCatsDogs()) {
                if (catDog != null) {
                    if (catDog.getOwner().getSurname().equals(surename)) {
                        System.out.println("----------------------------");
                        catDog.CatDogInfo();
                        catDog.getOwner().ownerInfo();
                        number++;
                    }
                }
            }
            for (Turtle turtle : owner.getTurtles()) {
                if (turtle != null) {
                    if (turtle.getOwner().getSurname().equals(surename)) {
                        turtle.turtleInfo();
                        turtle.getOwner().ownerInfo();
                        number++;
                    }
                }
            }
        }
        if (number == 0) {
            System.out.println("Nie ma takiego wlasciciela lub podany wlasciciel nie ma zwierzakow");
        }
    }

    public void Type() {
        int changeType = 1;
        System.out.println("Jaki typ maja miec wypisane zwierzaki?");
        System.out.println("1. Kot");
        System.out.println("2. Pies");
        System.out.println("3. Zolw");

        Scanner scType = new Scanner(System.in);
        if (scType.hasNextInt()) {
            changeType = scType.nextInt();
        } else {
            System.out.println("Wpisz cyfre od 1 do 3");
            Type();
            return;
        }
        if (changeType < 1 || changeType > 3) {
            System.out.println("Wpisz cyfre od 1 do 3");
            Type();

        }
        switch (changeType) {
            case 1: {
                for (Owner owner : owners) {
                    //  System.out.println("ilosc kotow"+owner.getNumberOfCatsDogs());
                    if (owner.getNumberOfCatsDogs() != 0) {
                        try {
                            for (CatDog catDog : owner.getCatsDogs()) {
                                if (catDog.getCatDo().equals(CatDo.CAT)) {
                                    catDog.CatDogInfo();
                                }
                            }
                        } catch (NullPointerException e) {
                        }
                    }

                }
                break;
            }
            case 2: {
                for (Owner owner : owners) {
                    if (owner.getNumberOfCatsDogs() != 0) {
                        try {
                            for (CatDog catDog : owner.getCatsDogs()) {
                                if (catDog.getCatDo().equals(CatDo.DOG)) {
                                    catDog.CatDogInfo();
                                }
                            }
                        } catch (NullPointerException e) {
                        }
                    }
                }
                break;

            }
            case 3: {
                TypZolwia();
            }
        }


    }

    public void TypZolwia() {
        int choiceTypeTurtle = 1;
        System.out.println("Jaki typ zolwia ma byc wypisany");
        System.out.println("1. Ladowy");
        System.out.println("2. Blotny");
        System.out.println("3. Morski");


        Scanner sc = new Scanner(System.in);
        if (sc.hasNextInt()) {
            choiceTypeTurtle = sc.nextInt();
        } else {
            System.out.println("Wpisz cyfre od 1 do 3");
            TypZolwia();
            return;
        }
        if (choiceTypeTurtle < 1 || choiceTypeTurtle > 3) {
            System.out.println("Wpisz cyfre od 1 do 3");
            TypZolwia();
            return;
        }

        switch (choiceTypeTurtle) {
            case 1: {
                for (Owner owner : owners) {

                    if (owner.getNumberOfTurtles() != 0) {
                        try {
                            for (Turtle turtle : owner.getTurtles()) {
                                if (turtle.getTurtleType() == TurtleType.TORTOISE) {
                                    turtle.turtleInfo();
                                }
                            }
                        } catch (NullPointerException e) {
                        }
                    }
                }
                break;
            }
            case 2: {
                for (Owner owner : owners) {
                    if (owner.getNumberOfTurtles() != 0) {
                        try {
                            for (Turtle turtle : owner.getTurtles()) {
                                if (turtle.getTurtleType() == TurtleType.SWAMP) {
                                    turtle.turtleInfo();
                                }
                            }
                        } catch (NullPointerException e) {
                        }
                    }
                }
                break;
            }
            case 3: {
                for (Owner owner : owners) {
                    if (owner.getNumberOfTurtles() != 0) {
                        try {
                            for (Turtle turtle : owner.getTurtles()) {
                                if (turtle.getTurtleType() == TurtleType.SEA) {
                                    turtle.turtleInfo();
                                }
                            }
                        } catch (NullPointerException e) {
                        }
                    }
                }
                break;
            }
        }
    }


}
