create or replace view lvpcomposant as
select cstrd.categories_id AS id_constructeur,
cstrd.categories_name AS libelle_constructeur,
left(man.manufacturers_name,2) AS code_type_produit,
cat.categories_id AS id_produit,prd.products_id AS id_composant,
catd.categories_name AS libelle_produit,man.manufacturers_name AS sous_type_composant,
prd.products_model AS ref_constructeur_composant,products_description.products_name AS ref_interne_composant,
products_description.products_description AS description_composant,prd.products_price AS le_prix
from (((((( rqdl.categories cat join  rqdl.categories_description catd) join  rqdl.categories cstr) join  rqdl.categories_description cstrd) join  rqdl.products prd)
join  rqdl.products_description) join  rqdl.manufacturers man) where ((cat.categories_id = catd.categories_id)
and (cat.parent_id = cstr.categories_id) and (cstrd.categories_id = cstr.categories_id) and (cstrd.language_id = 2)
and (products_description.language_id = 2) and (catd.language_id = 2) and (products_description.products_id = prd.products_id)
and (prd.master_categories_id = cat.categories_id) and (prd.manufacturers_id = man.manufacturers_id))

create or replace view lvpcomposant as
select cstrd.categories_id AS id_constructeur,
cstrd.categories_name AS libelle_constructeur,
left(man.manufacturers_name,2) AS code_type_produit,
cat.categories_id AS id_produit,prd.products_id AS id_composant,
catd.categories_name AS libelle_produit,man.manufacturers_name AS sous_type_composant,
prd.products_model AS ref_constructeur_composant,products_description.products_name AS ref_interne_composant,
products_description.products_description AS description_composant,prd.products_price AS le_prix
from (((((( lampe_fr.categories cat join  lampe_fr.categories_description catd) join  lampe_fr.categories cstr) join  lampe_fr.categories_description cstrd) join  lampe_fr.products prd)
join  lampe_fr.products_description) join  lampe_fr.manufacturers man) where ((cat.categories_id = catd.categories_id)
and (cat.parent_id = cstr.categories_id) and (cstrd.categories_id = cstr.categories_id) and (cstrd.language_id = 2)
and (products_description.language_id = 2) and (catd.language_id = 2) and (products_description.products_id = prd.products_id)
and (prd.master_categories_id = cat.categories_id) and (prd.manufacturers_id = man.manufacturers_id))

create or replace view hplcomposant as
select cstrd.categories_id AS id_constructeur,
cstrd.categories_name AS libelle_constructeur,
left(man.manufacturers_name,2) AS code_type_produit,
cat.categories_id AS id_produit,prd.products_id AS id_composant,
catd.categories_name AS libelle_produit,man.manufacturers_name AS sous_type_composant,
prd.products_model AS ref_constructeur_composant,products_description.products_name AS ref_interne_composant,
products_description.products_description AS description_composant,prd.products_price AS le_prix
from (((((( bis_lampe_eu.categories cat join  bis_lampe_eu.categories_description catd) join  bis_lampe_eu.categories cstr) join bis_lampe_eu.categories_description cstrd) join  bis_lampe_eu.products prd)
join  bis_lampe_eu.products_description) join  bis_lampe_eu.manufacturers man) where ((cat.categories_id = catd.categories_id)
and (cat.parent_id = cstr.categories_id) and (cstrd.categories_id = cstr.categories_id) and (cstrd.language_id = 2)
and (products_description.language_id = 2) and (catd.language_id = 2) and (products_description.products_id = prd.products_id)
and (prd.master_categories_id = cat.categories_id) and (prd.manufacturers_id = man.manufacturers_id)) 


create or replace view elstock as select * from rv_lampe_eu.el_stock