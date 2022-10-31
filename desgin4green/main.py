# -*- coding: utf-8 -*-



# --- LIBRARIES ---


import pandas as pd 
from pathlib import Path
import streamlit as st 
from PIL import Image
import base64


# --- PATH SETTINGS ---

current_dir = Path(__file__).parent if "__file__" in locals() else Path.cwd()
bd_cleanedbonnespratiques = current_dir / "assets" / "bonnespratiquesCLEANED.csv"
css_file = current_dir / "styles" / "style.css"
background = current_dir / "assets" / "background.jpg"

# --- WEBSITE TRASH TEST ---

df = pd.read_csv(bd_cleanedbonnespratiques)


def main(background):


    # --- LOAD CSS, PDF & PROFIL PIC ---
    with open(css_file) as f:
        st.markdown("<style>{}</style>".format(f.read()), unsafe_allow_html=True)

    background = Image.open(background)

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

    
main(background)
    