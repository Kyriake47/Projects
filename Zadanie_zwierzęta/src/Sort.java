import AnimalAndOwner.Owner;

import java.util.List;
import java.util.Scanner;

public class Sort {
    private int choiceSort = 1;


    Scanner scanner = new Scanner(System.in);

    private List<Owner> owners = Menu.getOwners();

    public void sortMenu() {

        System.out.println("Jak chcesz sortowac wlascicieli");
        System.out.println("1. Po nazwisku rosnaco");
        System.out.println("2. Po nazwisku malejaco");
        System.out.println("3. Po wieku rosnaco");
        System.out.println("4. Po wieku malejaco");
        System.out.println("5. Po liczbie posiadanych zwierzat roznaco");
        System.out.println("6. Po liczbie posiadanych zwierzat malejaco");


        Scanner sc = new Scanner(System.in);
        if (sc.hasNextInt()) {
            choiceSort = sc.nextInt();
        } else {
            System.out.println("Wpisz cyfre od 1 do 6");
            sortMenu();
            return;
        }
        if (choiceSort < 1 || choiceSort > 6) {
            System.out.println("Wpisz cyfre od 1 do 6");
            sortMenu();
        }

    }

    public void sort() {
        System.out.println("choicesort jest równe: " + choiceSort);
        switch (choiceSort) {

            case 1: {
                sortSurnameAscending();
                break;
            }
            case 2: {
                sortSurnameDescending();
                break;
            }
            case 3: {
                sortAgeAscending();
                break;
            }
            case 4: {
                sortAgeDescending();
                break;
            }
            case 5: {
                sortNumbersAnimalsAscending();
                break;
            }
            case 6:
                sortNumbersAnimalsDescending();
                break;
        }


    }

    ;

    public void sortSurnameAscending() {
        owners.sort((o1, o2) -> {
            return 1 * (o1.getSurname().compareTo(o2.getSurname()));
        });
    }

    public void sortSurnameDescending() {
        owners.sort((o1, o2) -> {
            return (-1) * (o1.getSurname().compareTo(o2.getSurname()));
        });
    }

    public void sortAgeAscending() {
        owners.sort((o1, o2) -> {
            return o1.getAge() - o2.getAge();
        });
    }

    public void sortAgeDescending() {
        owners.sort((o2, o1) -> {
            return o1.getAge() - o2.getAge();
        });
    }

    public void sortNumbersAnimalsAscending() {
        owners.sort((o1, o2) -> {
            return o1.getNumberOfAnimals() - o2.getNumberOfAnimals();
        });
    }

    public void sortNumbersAnimalsDescending() {
        owners.sort((o2, o1) -> {
            return o1.getNumberOfAnimals() - o2.getNumberOfAnimals();
        });
    }

}
