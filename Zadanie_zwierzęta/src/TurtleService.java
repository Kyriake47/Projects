import AnimalAndOwner.*;

import java.util.Scanner;

public class TurtleService extends Turtle implements AnimalService {
    Scanner scanner = new Scanner(System.in);

    @Override
    public void AddAnimal(Owner owner) {
        if (owner.getNumberOfAnimals() >= 3) {
            System.out.println("Wlasciciel nie moze miec juz wiecej zwierzat");
            return;
        }
        System.out.println("Jakiego zolwia chcesz dodac?");
        System.out.println("    1.      ladowy");
        System.out.println("    2.      blotny");
        System.out.println("    3.      morski");

        int choice = 1;

        Scanner sc = new Scanner(System.in);
        if (sc.hasNextInt()) {
            choice = sc.nextInt();
        } else {
            System.out.println("To nie jest cyfra. Wpisz cyfre od 1 do 3");
            AddAnimal(owner);
            return;
        }
        if (choice < 1 || choice > 3) {
            System.out.println("Wpisz cyfre od 1 do 3");
            AddAnimal(owner);
            return;
        }

        String nameTurtle = "";
        Gender gender = Gender.MAN;
        int age = 0;


        switch (choice) {
            case 1: {
                if (owner.getAge() >= 20) {

                    owner.addTab(GetInfo(owner, TurtleType.TORTOISE));
                } else {
                    System.out.println("Podany wlasciciel nie moze miec takiego zolwia. Ma mniej niz 20 lat.)");
                }
                break;
            }
            case 2: {
                if (owner.getAge() >= 25) {

                    owner.addTab(GetInfo(owner, TurtleType.SWAMP));
                } else {
                    System.out.println("Podany wlasciciel nie moze miec takeigo zolwia. Ma mniej niz 25 lat.)");
                }
                break;
            }
            case 3: {
                if ((owner.getAge() >= 35) && (owner.getSurname().charAt(0)) == 'M') {

                    owner.addTab(GetInfo(owner, TurtleType.SEA));
                } else {
                    System.out.println("Podany wlasciciel nie moze miec takiego zolwia. Ma mniej niz 35 lat i/lub nazwisko nie rozpoczyna sie na litere M.");
                }
                break;
            }
        }
    }

    public Turtle GetInfo(Owner owner, TurtleType type) {
        System.out.println("Podaj imie zolwia");
        String nameTurtle = scanner.next();

        Gender gender = null;
        do {
            System.out.println("Podaj plec zolwia. Dostepne to: ");
            Gender[] genders = Gender.values();
            for (Gender Gender : genders) {
                System.out.println(Gender.name());
            }

            try {
                gender = Gender.valueOf(scanner.next());
            } catch (IllegalArgumentException e) {
                System.out.println("nie ma takiej na liście");

            }
            ;
        } while (gender == null);

        int age = 151;
        do {
            System.out.println("Podaj wiek zolwia");
            Scanner scage = new Scanner(System.in);

            if (scage.hasNextInt()) {
                age = scage.nextInt();
            }

            if (age > 150) {
                System.out.println("Nieprawidlowa wartosc wieku");

            }

        } while (age < 0 || age > 150);
        return new Turtle(nameTurtle, gender, age, owner, type);
    }

}
