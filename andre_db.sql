PGDMP     :    	                x            Register    9.6.17    12.2     Y           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            Z           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            [           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            \           1262    16393    Register    DATABASE     �   CREATE DATABASE "Register" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Russian_Russia.1251' LC_CTYPE = 'Russian_Russia.1251';
    DROP DATABASE "Register";
                postgres    false            �            1259    16417    speaker    TABLE     �   CREATE TABLE public.speaker (
    id_speaker integer NOT NULL,
    name character varying(100),
    email character varying(100),
    password character varying(500)
);
    DROP TABLE public.speaker;
       public            postgres    false            �            1259    16415    speaker_id_speaker_seq    SEQUENCE        CREATE SEQUENCE public.speaker_id_speaker_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.speaker_id_speaker_seq;
       public          postgres    false    190            ]           0    0    speaker_id_speaker_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.speaker_id_speaker_seq OWNED BY public.speaker.id_speaker;
          public          postgres    false    189            �           2604    16420    speaker id_speaker    DEFAULT     x   ALTER TABLE ONLY public.speaker ALTER COLUMN id_speaker SET DEFAULT nextval('public.speaker_id_speaker_seq'::regclass);
 A   ALTER TABLE public.speaker ALTER COLUMN id_speaker DROP DEFAULT;
       public          postgres    false    189    190    190            V          0    16417    speaker 
   TABLE DATA           D   COPY public.speaker (id_speaker, name, email, password) FROM stdin;
    public          postgres    false    190   �       ^           0    0    speaker_id_speaker_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.speaker_id_speaker_seq', 9, true);
          public          postgres    false    189            �           2606    16425    speaker pk_speaker 
   CONSTRAINT     X   ALTER TABLE ONLY public.speaker
    ADD CONSTRAINT pk_speaker PRIMARY KEY (id_speaker);
 <   ALTER TABLE ONLY public.speaker DROP CONSTRAINT pk_speaker;
       public            postgres    false    190            �           1259    16426 
   speaker_pk    INDEX     K   CREATE UNIQUE INDEX speaker_pk ON public.speaker USING btree (id_speaker);
    DROP INDEX public.speaker_pk;
       public            postgres    false    190            V   �   x�-���0@ѳ3L��o�K'��=1 �P�!l\��~�l�r�u���fk��h��-1&BAj.�x����q@���owo�e����m9�(u�0��;�R���ZL� ��I5��X�� �J�]�Rsg�� _Q/�     