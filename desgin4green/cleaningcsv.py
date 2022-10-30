# -*- coding: utf-8 -*-
"""
Created on Sat Oct 29 18:32:49 2022

@author: etien


Streamlit design 4 green 

"""


# --- LIBRARIES ---


import pandas as pd 
from pathlib import Path
import streamlit as st 


# --- PATH SETTINGS ---


current_dir = Path(__file__).parent if "__file__" in locals() else Path.cwd()
bd_bonnespratiques = current_dir / "bd" / "bonnespratiques.csv"


# --- OPENING DATA ---

df = pd.read_csv(bd_bonnespratiques)

# --- CLEANING DATA ---

df = df.drop(df.index[0])
del df['Unnamed: 1']
del df['Unnamed: 26']
del df['Unnamed: 27']
df = df.rename(columns = {'Unnamed: 0':'Famille', 'Unnamed: 2':'Planet','Unnamed: 3':'People','Unnamed: 4':'Prosperity','N/A':'Critères','Conception':'Etape Cycle de Vie', 'Etapes Cycle de Vie': 'Recommandation', 'Acquisition':'Justifications', 'Fin de Vie':'Recomandation/Conseil', 'Unnamed: 16':'Objectifs Developpement Durable(ODD)', 'Unnamed: 17': 'Incontournables', 
'Unnamed: 30':'Automatisation Level', 'Unnamed: 19':'Acteurs', 'Unnamed: 24':'Récurrence', 'Unnamed: 28':'Automatisable Y / N', 'Unnamed: 31':'Automatisation Informations', 'Unnamed: 25':'Use Case', 'Unnamed: 18':'Tags Opérationnel', 'Unnamed: 20':'Indicateurs', 'Unnamed: 23':'Priorité',
'Unnamed: 21':'X Indicateurs', 'Unnamed: 22':'Y Indicateurs', 'Unnamed: 29':'Automatisation'})
df = df.drop(df.index[0])
df = df.reset_index()
del df['index']



df.to_csv("bonnespratiquesCLEANED.csv")



# --- WEBSITE TRASH TEST ---

def main():


    st.markdown("<h1 style='text-align: center; color: green;'>Les bonnes pratiques d'écoconception</h1>", unsafe_allow_html=True)
    
    
    selector = st.selectbox('Famille', df['Famille'].unique())
    
    selector2 = st.selectbox('Planet', df["Planet"].unique())
    
    selector3 = st.selectbox('Priorité', df["Priorité"].unique())
    
    values = df[(df["Famille"] == selector) & (df["Planet"] == selector2) & (df['Priorité'] == selector3)] 
    
    hide_table_row_index = """
            <style>
            thead tr th:first-child {display:none}
            tbody th {display:none}
            </style>
            """
            
    st.markdown(hide_table_row_index, unsafe_allow_html=True)
    
    
    st.write('### Full Dataset', values)
    
    selected_indices = st.multiselect('''Ecrivez l'index du service souhaité:''', df.index)
    selected_rows = df.loc[selected_indices]
    st.write('### Votre Panier', selected_rows)
    
    st.write('#### Télécharger votre panier')
    
    def convert_df(df):
        return df.to_csv(index=False).encode('utf-8')


    csv = convert_df(selected_rows)

    st.download_button(
        "Press to Download",
        csv,
        "votrepanier.csv",
        "text/csv",
        key='download-csv'
        )

    
main()
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        