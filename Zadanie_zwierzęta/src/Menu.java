
import AnimalAndOwner.Gender;
import AnimalAndOwner.Owner;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class Menu {
    private static List<Owner> owners = new ArrayList<>();


    Scanner scanner = new Scanner(System.in);
    Sort sort = new Sort();
    Add add = new Add();

    public void menu() {
        if (owners.size() == 0) {
            owners.add(new Owner("c", "d", Gender.MAN, 7));
            owners.add(new Owner("a", "a", Gender.WOMAN, 40));
            owners.add(new Owner("d", "c", Gender.MAN, 2));
        }


        System.out.println("*********************************");
        System.out.println("*    Co chcialbys zrobic?       *");
        System.out.println("*********************************");
        System.out.println("    1. Dodaj wlasciciela");
        System.out.println("    2. Lista wlascicieli");
        System.out.println("    3. Ustaw tryb sortowania");
        System.out.println("    4. Sortuj wlascicieli");
        System.out.println("    5. Dodaj zwierzaka");
        System.out.println("    6. Wypisz zwierzaki wybranego wlasciciela");
        System.out.println("    7. Wypisz wyszystkie zwierzaki");
        System.out.println("    8. Wyszukaj zwierzaki");
        System.out.println("    9. Zakoncz");
        int choice = 1;


        Scanner sc = new Scanner(System.in);
        if (sc.hasNextInt()) {
            choice = sc.nextInt();
        } else {
            System.out.println("Wpisz cyfre od 1 do 9");
            menu();
            return;
        }

        if (choice < 1 || choice > 9) {
            System.out.println("Wpisz cyfre od 1 do 9");
            menu();
        }

        switch (choice) {
            case 1: {
                add.addOwner();
                menu();
            }
            case 2: {
                System.out.println("------------lista wlascicieli--------------");
                for (Owner owner : owners) {
                    owner.ownerInfo();
                    System.out.println("---");
                }
                menu();
            }
            case 3: {
                sort.sortMenu();
                menu();

            }
            case 4: {
                sort.sort();
                menu();

            }
            case 5: {
                System.out.println("Jakiego zwierzaka chcesz dodac");
                System.out.println("    1.  Kot");
                System.out.println("    2.  Pies");
                System.out.println("    3.  Zolw");
                add.AddAnimal();
                menu();
            }
            case 6: {
                listOwnersAnimals();
                menu();
            }
            case 7: {
                listAnimals();
                menu();
            }
            case 8: {
                System.out.println("Jak chcesz wyszukiwac?");
                System.out.println("    1. Po imieniu zwierzaka");
                System.out.println("    2. Wiek wiekszy od");
                System.out.println("    3. Po nazwisku wlasciciela");
                System.out.println("    4. Po typie zwierzaka");
                search();
                menu();
            }
            case 9: {
                System.exit(0);
            }

        }

    }

    public void listOwnersAnimals() {
        System.out.println("Podaj imie wlasciciela");
        String name = scanner.next();
        System.out.println("Podaj nazwisko wlsciciela");
        String surname = scanner.next();


        int number = 0;
        for (Owner owner : owners) {
            if (name.equals(owner.getName()) && surname.equals(owner.getSurname())) {
                owner.AnimalInfo();
                number++;
            }
        }
        if (number == 0) {
            System.out.println("nie ma wlasciciela o takim imieniu i nazwisku");
        }

    }

    public void listAnimals() {
        for (Owner owner : owners) {
            if (owner.getNumberOfAnimals() != 0) {
                System.out.println("------------------------------------------");
                owner.AnimalInfo();
                System.out.println("Powyższe zwierzaki naleza do: ");
                owner.ownerInfo();
            }

        }
    }

    public void search() {
        int search = 1;
        Scanner scType = new Scanner(System.in);
        if (scType.hasNextInt()) {
            search = scType.nextInt();
        } else {
            System.out.println("Wpisz cyfre od 1 do 4");
            search();
            return;
        }
        if (search < 1 || search > 4) {
            System.out.println("Wpisz cyfre od 1 do 4");
            search();

        }

        Search search2 = new Search();
        switch (search) {
            case 1: {
                search2.searchByName();
                break;
            }
            case 2: {
                search2.searchByAge();
                break;
            }
            case 3: {
                search2.searchByOwner();
                break;
            }
            case 4: {
                search2.Type();
            }
        }
    }

    public static List<Owner> getOwners() {
        return owners;
    }

}
