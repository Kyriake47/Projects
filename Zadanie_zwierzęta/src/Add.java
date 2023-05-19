import AnimalAndOwner.*;

import java.util.List;
import java.util.Scanner;

public class Add extends CatDogService {

    Scanner scanner = new Scanner(System.in);
    private List<Owner> owners = Menu.getOwners();

    public void addOwner() {

        if (owners.size() < 5) {


            System.out.println("Podaj imie wlasciciela");
            String name = scanner.next();
            System.out.println("Podaj nazwisko wlasciciela");
            String surname = scanner.next();

            for (Owner owner : owners) {
                if ((name.equals(owner.getName())) && (surname.equals(owner.getSurname()))) {
                    System.out.println("Wlasciciel z takim imieniem juz istnieje");
                    return;
                }
            }


            Gender gender = null;
            do {

                System.out.println("Podaj plec wlasciciela. Dostepne to: ");
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
                System.out.println(gender);
            } while (gender == null);


            int age = 150;

            do {
                System.out.println("Podaj wiek wlasciciela");
                Scanner scage = new Scanner(System.in);

                if (scage.hasNextInt()) {
                    age = scage.nextInt();
                }

                if (age > 140) {
                    System.out.println("Nieprawidlowa wartosc wieku");

                }

            } while (age < 0 || age > 140);
            owners.add(new Owner(name, surname, gender, age));

            System.out.println("Wlasciciel zostal dodany");

        } else {
            System.out.println("Nie mozna dodac wiecej wlascicieli. Obecna ilosc dodanych wlascicieli to " + (owners.size()));
        }
    }


    public void AddAnimal() {
        int animal = 0;
        do {
            Scanner scanimal = new Scanner(System.in);
            if (scanimal.hasNextInt()) {
                animal = scanimal.nextInt();
            } else {
            }
            if (animal < 1 || animal > 3) {
                System.out.println("Wpisz cyfre od 1 do 3");
                AddAnimal();
                return;
            }
        } while (animal < 1 || animal > 3);
        System.out.println("Podaj imie wlasciciela, do ktorego ma zostac dodany zwierzak. ");
        String name = scanner.next();
        System.out.println("Podaj nazwisko wlasciciela, do ktorego ma zostac dodany zwierzak. ");
        String surname = scanner.next();
        int number = 0;
        switch (animal) {

            case 1: {
                for (Owner owner : owners) {
                    if ((name.equals(owner.getName())) && (surname.equals(owner.getSurname()))) {
                        CatDogService catDog = new CatDogService();
                        catDog.setCatDo(CatDo.CAT);
                        catDog.AddAnimal(owner);
                        number++;
                    }
                }
                if (number == 0) {
                    System.out.println("Nie ma wlasciciela o takim imieniu i nazwisku");
                }
                number = 0;
                break;
            }
            case 2: {
                for (Owner owner : owners) {
                    if ((name.equals(owner.getName())) && (surname.equals(owner.getSurname()))) {
                        CatDogService catDog = new CatDogService();
                        catDog.setCatDo(CatDo.DOG);
                        catDog.AddAnimal(owner);
                        number++;
                    }
                }
                if (number == 0) {
                    System.out.println("Nie ma wlasciciela o takim imieniu i nazwisku");
                }
                number = 0;
                break;

            }
            case 3: {
                for (Owner owner : owners) {
                    if (name.equals(owner.getName()) && surname.equals(owner.getSurname())) {
                        TurtleService turtle = new TurtleService();
                        turtle.AddAnimal(owner);
                        number++;
                    }
                }
                if (number == 0) {
                    System.out.println("Nie ma wlasciciela o takim imieniu i nazwisku");
                }
                number = 0;

                break;
            }
        }
    }


}


