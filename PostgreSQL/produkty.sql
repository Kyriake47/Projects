--
-- PostgreSQL database dump
--

-- Dumped from database version 15.3
-- Dumped by pg_dump version 15.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;


--
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


--
-- Name: dostepnosc(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.dostepnosc() RETURNS trigger
    LANGUAGE plpgsql
    AS $$BEGIN
        IF NEW.ilosc < 0 THEN
            RAISE EXCEPTION 'Nie ma tyle produktu';
        END IF;
	RETURN NEW;
END;
$$;


ALTER FUNCTION public.dostepnosc() OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: Klienci; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Klienci" (
    "Id_klient" integer NOT NULL,
    "Imie" text NOT NULL,
    "Nazwisko" text NOT NULL
);


ALTER TABLE public."Klienci" OWNER TO postgres;

--
-- Name: Zamowienia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Zamowienia" (
    "Id_klient" integer NOT NULL,
    "Id_produkt" integer NOT NULL,
    "Ilosc" integer
);


ALTER TABLE public."Zamowienia" OWNER TO postgres;

--
-- Name: produkty; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produkty (
    id integer NOT NULL,
    nazwa text,
    ilosc integer,
    cena double precision,
    typ text
);


ALTER TABLE public.produkty OWNER TO postgres;

--
-- Name: produkty_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produkty_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produkty_id_seq OWNER TO postgres;

--
-- Name: produkty_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produkty_id_seq OWNED BY public.produkty.id;


--
-- Name: produkty id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produkty ALTER COLUMN id SET DEFAULT nextval('public.produkty_id_seq'::regclass);


--
-- Data for Name: Klienci; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Klienci" ("Id_klient", "Imie", "Nazwisko") FROM stdin;
1	Adam	Nowak
2	Jan	Kowalski
3	Katarzyna	Czoske
\.


--
-- Data for Name: Zamowienia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Zamowienia" ("Id_klient", "Id_produkt", "Ilosc") FROM stdin;
1	14	50
2	17	100
3	15	150
\.


--
-- Data for Name: produkty; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produkty (id, nazwa, ilosc, cena, typ) FROM stdin;
13	dlugopis	200	2	papiernicze
1	zeszyt	100	2.5	papiernicze
14	olowek	150	1	papiernicze
15	mysz_komputerowa	200	20	sprzet
16	kabelUSB	120	10	sprzet
17	pendrive	200	30	sprzet
\.


--
-- Name: produkty_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produkty_id_seq', 18, true);


--
-- Name: Klienci Klienci_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Klienci"
    ADD CONSTRAINT "Klienci_pkey" PRIMARY KEY ("Id_klient");


--
-- Name: produkty produkty_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produkty
    ADD CONSTRAINT produkty_pkey PRIMARY KEY (id);


--
-- Name: Zamowienia sprawdz_dostepnosc; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER sprawdz_dostepnosc BEFORE INSERT OR UPDATE ON public."Zamowienia" FOR EACH ROW EXECUTE FUNCTION public.dostepnosc();


--
-- Name: Zamowienia Zamowienia_Id_klient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Zamowienia"
    ADD CONSTRAINT "Zamowienia_Id_klient_fkey" FOREIGN KEY ("Id_klient") REFERENCES public."Klienci"("Id_klient");


--
-- Name: Zamowienia Zamowienia_Id_produkt_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Zamowienia"
    ADD CONSTRAINT "Zamowienia_Id_produkt_fkey" FOREIGN KEY ("Id_produkt") REFERENCES public.produkty(id);


--
-- PostgreSQL database dump complete
--

