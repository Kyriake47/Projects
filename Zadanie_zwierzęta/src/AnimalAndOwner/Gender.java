package AnimalAndOwner;

public enum Gender {
    WOMAN("kobieta"),
    MAN("mezczyzna");

    private String plgender;

    Gender(String plgender) {
        this.plgender = plgender;
    }

    public String getPlgender() {
        return plgender;
    }

    @Override
    public String toString() {
        return plgender;
    }
}
